<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace Btybug\Console\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Painter\Painter;
use Btybug\Console\Models\Fields;
use Btybug\Console\Services\FieldService;
use Illuminate\Http\Request;
use Btybug\btybug\Models\ContentLayouts\ContentLayouts;
use Btybug\btybug\Models\ExtraModules\Structures;
use Btybug\btybug\Models\Routes;
use Btybug\btybug\Services\CmsItemReader;
use Btybug\Console\Http\Requests\Structure\FieldCreateRequest;
use Btybug\Console\Http\Requests\Structure\FormCreateRequest;
use Btybug\Console\Http\Requests\Structure\FormSettingsUpdateRequest;
use Btybug\Console\Http\Requests\Structure\PageEditRequest;
use Btybug\Console\Http\Requests\Structure\SavePageSettingsRequest;
use Btybug\Console\Repository\AdminPagesRepository;
use Btybug\Console\Repository\FieldsRepository;
use Btybug\Console\Repository\FormsRepository;
use Btybug\Console\Repository\VersionsRepository;
use Btybug\Console\Services\FieldValidationService;
use Btybug\Console\Services\FormService;
use Btybug\Console\Services\StructureService;
use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\User\Services\RoleService;
use Btybug\User\Services\UserService;

/**
 * Class ModulesController
 * @package Btybug\Modules\Models\Http\Controllers
 */
class StructureController extends Controller
{
    public $adminPagesRepository;
    public $formsRepository;
    public $fieldsRepository;
    public $adminsettingRepository;
    public $structureService;
    public $roleService;
    public $userService;
    public $formService;
    public $fieldService;
    public $fieldValidationService;
    public $painter;

    public function __construct(
        AdminPagesRepository $adminPagesRepository,
        FormsRepository $formsRepository,
        FieldsRepository $fieldsRepository,
        AdminsettingRepository $adminsettingRepository,
        StructureService $structureService,
        RoleService $roleService,
        UserService $userService,
        FormService $formService,
        FieldService $fieldService,
        FieldValidationService $fieldValidationService,
        Painter $painter
    )
    {
        $this->adminPagesRepository = $adminPagesRepository;
        $this->formsRepository = $formsRepository;
        $this->fieldsRepository = $fieldsRepository;
        $this->adminsettingRepository = $adminsettingRepository;
        $this->structureService = $structureService;
        $this->roleService = $roleService;
        $this->userService = $userService;
        $this->formService = $formService;
        $this->fieldService = $fieldService;
        $this->fieldValidationService = $fieldValidationService;
        $this->painter = $painter;
    }

    public function getIndex()
    {
        return view('console::structure.index');
    }

    public function getTables()
    {
        return view('console::structure.tables', ['tables' => $this->structureService->getTables()]);
    }

    public function getPages(
        Request $request
    )
    {
        $pageGrouped = $this->adminPagesRepository->getGroupedWithModule();
        $page = $this->structureService->getPage($request->page);
        $rolesData = $this->roleService->getRolesSeperetedWith();
        return view('console::structure.pages.index', compact(['pageGrouped', 'page', 'rolesData']));
    }

    public function getPageSettings(
        Request $request
    )
    {
        $page = $this->adminPagesRepository->findOrFail($request->id);
        $admins = $this->userService->getAdmins()->pluck('username', 'id')->toArray();
        $page->setAttribute('cssData', []);
        $page->setAttribute('jsData', []);
        return view('console::structure.pages.settings', compact(['page', 'admins']));
    }

    public function postPageSettings(
        $id,
        PageEditRequest $request
    )
    {
        $data = $request->except('_token', 'type', 'tags', 'classify', 'header_unit', 'backend_page_section', 'placeholders');
        if(isset($data['url']) && ! starts_with($data['url'], '/')) $data['url'] = "/" . $data['url'];
        $this->adminPagesRepository->update($id, $data);
        return redirect()->route('pages_index')->with('message', 'Successfully Updated Page');
    }

    public function getClassify()
    {
        return view('console::structure.classify.index');
    }

    public function getUrls(
        Request $request
    )
    {
        $method = $request->get('method', 'all');
        $data = $this->structureService->getUrls($method);
        return view('console::structure.urls.index', compact('data', 'method'));
    }

    public function getPagePreview(
        $pageId,
        Request $request
    )
    {
        return $this->structureService->getPagePreview($pageId, $request);
    }

    public function postSavePageSettings(
        $pageId,
        SavePageSettingsRequest $pageSettingsRequest
    )
    {
        $page = $this->structureService->postPagePreview($pageId, $pageSettingsRequest);
        return \Response::json(['error' => false, 'message' => 'Page Layout settings Successfully assigned', 'module' => $page->module_id]);
    }

    public function postPageData(
        Request $request
    )
    {
        $page = $this->adminPagesRepository->findOrFail($request->id);
        $layout = ContentLayouts::findVariation($page->layout_id);
        $html = view('console::structure._partials.page_data', compact(['page']))->render();

        return \Response::json(['error' => false, 'html' => $html, 'page' => $page, 'value' => ($layout) ? $layout->id : 0]);
    }

    public function getForms()
    {
        $forms = $this->formsRepository->getBy('type', 'new');
        return view('console::structure.forms.list', compact('forms'));
    }

    public function getCreateForm(
        Request $request
    )
    {
        $builders = Structures::getBuilderModules()->pluck('name','slug')->toArray();
        $builder = Structures::find($request->slug);
        $fieldJson = $this->fieldService->fieldsJson($request);
        $file = $this->formService->getBuilderRendered($builder);
        return view('console::structure.forms.create-form', ['form_slug' => uniqid(), 'builders' => $builders,
            'form_type' => $request->form_type, 'fields_type' => $request->fields_type, 'fieldJson'=>$fieldJson, 'file'=>$file, 'slug' => $request->slug]);
    }

    public function getAddFieldModal(
        Request $request
    )
    {
        $form = $this->formsRepository->getNewCoreFormsBySlug($request->slug);
        return $this->structureService->getAddFieldModal($request->slug, $form, $this->fieldsRepository);
    }

    public function getUnitFieldModal(
        Request $request
    )
    {
        return \Response::json(['html' => $this->structureService->getUnitFieldModal($request)]);
    }

    public function getUnitEditFieldModal(
        Request $request
    )
    {
        return \Response::json(['html' => $this->structureService->getUnitEditFieldModal($request->all())]);
    }


    public function getAvailableFieldsModal(
        Request $request
    )
    {
        return \Response::json($this->fieldService->getAvailableFields($request->fields_type));
    }

    public function getUnitVariations(
        Request $request
    )
    {
        return \Response::json(['html' => $this->structureService->getUnitVariations($request)]);
    }

    public function getUnitSettingsPage(
        Request $request
    )
    {
        $data = $this->structureService->getUnitSettingsPage($request);
        return \Response::json(['settings' => $data['settings'], 'type' => $data['type']]);
    }

    public function getComponentSettings(
        Request $request
    )
    {
        return $this->structureService->getComponentSettings($request);
    }

    public function getUnitVariationField(
        Request $request
    )
    {
        return $this->structureService->getUnitVariationField($request);
    }

    public function getUnitVariationSettings(
        Request $request
    )
    {
        return $this->structureService->getUnitVariationSettings($request);
    }

    public function getCreateField()
    {
        $defaultFieldHtml = $this->adminsettingRepository->getSettings('setting_system', 'default_field_html');
        return view('console::structure.forms.create_field', compact('defaultFieldHtml'));
    }

    public function getCreateFieldNew()
    {
        return view('console::structure.forms.create_field_studio');
    }

    public function getFields()
    {
        $fields = $this->fieldsRepository->getAll();
        return view('console::structure.forms.fields', compact(['fields']));
    }

    public function getEditForms()
    {
        $forms = $this->formsRepository->getBy('type', 'edit');
        return view('console::structure.forms.edit_forms', compact(['forms']));
    }

    public function postCreateField(
        FieldCreateRequest $request
    )
    {
        $this->structureService->saveField($request->except('_token'));
        return redirect()->route('fields')->with('message', 'Field created');
    }

    public function getEditField(
        Request $request
    )
    {
        $field = $this->fieldsRepository->findOrFail($request->id);
        $unit = $this->painter->find(explode('.', $field->unit)[0]);
        $rule = $this->fieldValidationService->getBaseValidationRulse($field->table_name, $field->column_name);
        $required = $this->fieldValidationService->isRequired($field->table_name, $field->column_name);
        $increment = $this->fieldValidationService->isAutoIncrement($field->table_name, $field->column_name);

        return view('console::structure.forms.edit_field', compact(['field', 'unit', 'rule', 'required', 'increment']));
    }

    public function postEditField(
        $id,
        Request $request
    )
    {
        $field = $this->fieldsRepository->findOrFail($id);
        $this->structureService->fieldUpdate($request->except('_token'), $field);
        return redirect()->route('fields')->with('message', 'Field Updated');
    }

    public function postRenderFieldHtml(
        Request $request
    )
    {
        return \Response::json(['data' => BBRenderUnits($request->unit, $request->all())]);
    }

    public function postMapping(
        Request $request
    )
    {
        $field = $this->fieldsRepository->findOrFail($request->id);
        $field->type = $request->type;
        $html = view("console::structure.developers._partials.mapping-column", compact('field'))->render();

        return \Response::json(['data' => $html]);
    }

    public function getCreateAdvanced()
    {
        return view('console::structure.forms.advanced');
    }

    public function getUnitRender(
        Request $request
    )
    {
        return $this->structureService->getComponentSettings($request);
    }

    public function postSaveForm(
        FormCreateRequest $request
    )
    {
        $this->structureService->createForm($request->except('_token'));
        return redirect()->to('/admin/console/structure/edit-forms')->with('message', 'Form Successfully created');
    }

    public function getFormEdit(
        $id
    )
    {
        $form = $this->formsRepository->findOrFail($id);
        $settings = $form->settings;
        $fields = $this->fieldsRepository->getBy('table_name', $form->fields_type);
        $existingFields = (count($form->form_fields)) ? $form->form_fields()->pluck('field_slug', 'field_slug')->toArray() : [];

        return view('console::structure.forms.edit-form', compact('form', 'fields', 'existingFields','settings'));
    }


    public function getDefaultHtml()
    {
        $data = $this->structureService->getDefaultHtml();
        return \Response::json($data);
    }

    public function getCustomHtml(
        Request $request
    )
    {
        $data = $this->structureService->getCustomHtml($request);
        return \Response::json($data);
    }

    public function getSavedHtmlType(
        Request $request
    )
    {
        $data = $this->structureService->getSavedHtmlType($request);
        return \Response::json($data);
    }

    public function postChangeFieldStatus(
        Request $request
    )
    {
        $success = $this->structureService->postChangeFieldStatus($request);
        return \Response::json([
            'success' => $success
        ]);
    }

    public function postFormEdit(
        $id,
        Request $request
    )
    {
        $form = $this->formService->createOrUpdate($request->except('_token'));
        return redirect()->to('/admin/console/structure/forms');
    }

    public function postNewBuilder(
        $id,
        Request $request
    )
    {
        $data = $request->all();
        $form = $this->formsRepository->findOrFail($id);
        $response = $this->formService->validateColumns($form->id, $data['fields']);

        if ($response['error']) return \Response::json(['error' => true, 'message' => $response['message']]);
        $data = $this->structureService->postNewBuilder($request, $id);

        return \Response::json($data);
    }

    public function postBuilder(
        Request $request
    )
    {
        $data = $this->structureService->postBuilder($request);
        return \Response::json($data);
    }

    public function getFormSettings(
        $id
    )
    {
        $form = $this->formsRepository->findOrFail($id);
        $fields = $this->structureService->getFieldsByFormType($form);
        $settings = json_decode($form->settings, true);

        return view('console::structure.forms.form-settings', compact(['form', 'fields', 'settings']));
    }

    public function postFormSettings(
        $id,
        FormSettingsUpdateRequest $request
    )
    {
        $settings = json_encode($request->only('message', 'is_ajax', 'event'));
        $this->formsRepository->update($id, [
            'fields_type' => $request->fields_type,
            'form_type' => $request->form_type,
            'settings' => $settings
        ]);

        return redirect()->to('/admin/console/structure/forms')->with('message', 'Settings saved successfully');
    }

    public function postAvailableFields(
        Request $request
    )
    {
        $html = $this->structureService->postAvailableFields($request->table);
        return \Response::json([
            'error' => false,
            'html' => $html
        ]);
    }

    public function getFormEntries(
        $id
    )
    {
        $form = $this->formsRepository->findOrFail($id);
        return view('console::structure.forms.entries')->with(['form' => $form, 'entries' => $form->entries]);
    }

    public function postGetEntryData(
        Request $request
    )
    {
        return \Response::json($this->structureService->getEntryData($request));
    }

    public function getEditForm(
        $id,
        Request $request
    )
    {
        $form = $this->formsRepository->findOrFail($id);
        $fields = $this->formService->getFields(true);
        $blade = $this->formService->renderBlade($id);
        $bladeRendered = $form->render($id);
        $modules = Structures::getBuilderModules()->toArray();
        $data = $this->structureService->getBuilders($modules, $form, $request);

        if ($form->form_type == 'user') {
            $fieldJson = json_encode($this->fieldsRepository->getByTableNameActiveAndAvailablity($form->fields_type)->toArray());
        } else {
            $fieldJson = json_encode($this->fieldsRepository->getByTableNameAndActive($form->fields_type)->toArray());
        }

        return view('console::structure.forms.create-form', compact(['form', 'blade', 'fields', 'bladeRendered', 'fieldJson']))->with($data);
    }

    public function postRenderFieldHtmlForResult(
        $id,
        Request $request
    ){
        $field = $this->fieldsRepository->findOrFail($id);
        $data = $request->except('_token');

        foreach ($data as $key => $val){
            $field[$key] = $val;
        }
        $html = FieldService::getFieldHtml($field);

        return \Response::json(['html' => $html]);
    }
}
