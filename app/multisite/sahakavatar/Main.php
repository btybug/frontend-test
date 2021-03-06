<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 16:09
 */

namespace App\multisite\sahakavatar;


use Btybug\btybug\Models\Settings;
use Btybug\Mini\Model\MiniPainter;
use App\multisite\sahakavatar\Providers\ModuleServiceProvider;
use Btybug\FrontSite\Models\FrontendPage;
use Btybug\Uploads\Repository\FormBuilderRepository;
use Btybug\User\User;
use Illuminate\Http\Request;

class Main
{
    private $user;
    private $request;
    private $formbuilderRepository;

    public function __construct(User $user, Request $request)
    {
        app()->register(ModuleServiceProvider::class);
        $this->user = $user;
        $this->request = $request;
        $this->formbuilderRepository=new FormBuilderRepository();
    }
 public function run()
    {
        return view('mini::account')->with('user', $this->user);
    }

    public function responseJson($error = false,$message = '', $data = [])
    {
        return \Response::json(['error' => $error,'message' => $message,'response' => $data]);
    }

    public function listPages()
    {
        return view('mini::pages.lists')->with(['user' => $this->user, 'pages' => $this->user->frontPages]);
    }

    ////////////////////////////Account Settings /////////////////////////
    public function accountSettings()
    {
        $selectedForm = Settings::where('section', 'minicms')->where('settingkey', 'user_details_form_id')->first();

        $form=null;
        if($selectedForm){
        $form= $this->formbuilderRepository->findOrFail($selectedForm->val);
        }
        return view('mini::account.settings',compact('form'))->with('user', $this->user);

    }
    public function accountSettingsTab1()
    {
        return view('mini::account._partials.tab1')->with('user', $this->user);

    }
    public function accountSettingsTab2()
    {
        return view('mini::account._partials.tab2')->with('user', $this->user);

    }
    public function accountSettingsTab3()
    {
        return view('mini::account._partials.tab3')->with('user', $this->user);

    }
    public function accountSettingsTab4()
    {
        return view('mini::account._partials.tab4')->with('user', $this->user);

    }
    //////////////////////////////////// Forms /////////////////////////////////
    public function accountForms()
    {
        return view('mini::account.forms')->with('user', $this->user);

    }

    public function accountFormBuilder()
    {
        return view('mini::account.formBuilder')->with('user', $this->user);

    }

    public function FormSave()
    {
        return \Response::json(['error' => false,'url' => route('mini_account_forms')]);
    }

    public function FormEdit($editableData)
    {
        return view('mini::account.formBuilder')->with(['editableData' => $editableData,'user' =>  $this->user]);
    }

    public function FormRender($editableData)
    {
        return view('mini::account.formrender')->with(['editableData' => $editableData,'user' =>  $this->user]);
    }

    public function FormInputs($id)
    {
        return view('mini::account.inputs')->with(['id' => $id,'user' =>  $this->user]);
    }
    /////////////////////////////////////////////////////////////////////////////////
    public function accountGeneral()
    {
        return view('mini::account.formrender')->with('user', $this->user);

    }

    public function media()
    {
        return view('mini::media.drive')->with('user', $this->user);

    }

    public function mediaSettings()
    {
        return view('mini::media.settings')->with('user', $this->user);

    }

    public function preferences()
    {
        return view('mini::preferences.lists')->with('user', $this->user);

    }
    ////////////////////////////////////////// Extra /////////////////////////////////////
    public function extraPlugins()
    {
        return view('mini::extra.plugins')->with('user', $this->user);

    }

    public function pluginsSettings()
    {
        return view('mini::extra.plugin_settings')->with('user', $this->user);
    }

    public function extraGears($units,$model,$slug,$tags,$memberships,$variations)
    {
        BBAddTab('mini_my_site_extra_units', [
            'title' => 'Add New Unit',
            'url' => '#',
            'item_class' => 'pull-right info'
        ]);
        $units = MiniPainter::all()->get();
        return view('mini::extra.gears', compact('units','model','slug','tags','memberships','variations'))->with('user', $this->user);

    }
    public function extraWidgets($units,$model,$slug,$tags,$memberships,$variations)
    {
        BBAddTab('mini_my_site_extra_units',[
            'title' => 'Add New Widgets',
            'url' => '#',
            'item_class'=>'pull-right'
        ]);
        $user = $this->user;
        return view('mini::extra.widgets', compact(['units', 'model', 'slug','tags','memberships','variations','user']));

    }
    public function extraLayouts($layouts,$model,$slug,$variations)
    {
        BBAddTab('mini_assets',[
            'title' => 'Add New Layout',
            'url' => '#',
            'item_class'=>'pull-right info'
        ]);
        $user = $this->user;
        return view('mini::extra.layouts', compact(['layouts', 'model', 'slug','variations','user']));

    }
    ////////////////////////////////////// Pages /////////////////////////////////////////////////
    public function pageEdit()
    {
        $id = $this->request->id;
        $page = FrontendPage::find($id);
        $unit=MiniPainter::findByVariation($page->template);
        $variations=($unit)?$unit->variations()->all()->getItems()->pluck('title','id'):[];
        return view('mini::pages.edit', compact('page', 'id','variations'))->with('user', $this->user);

    }

    public function pageEditContent()
    {
        $id = $this->request->id;
        $page = FrontendPage::find($id);
        $page->setAttribute('cssData', []);
        $page->setAttribute('jsData', []);
        return view('mini::pages.content', compact('page', 'id'))->with('user', $this->user);

    }


    ////////////////////////////////////////////////////////////////////////////////////////////////


    public function mySiteSettings()
    {
        return view('mini::mysite.settings')->with('user', $this->user);

    }
    public function mySiteCover()
    {
        return view('mini::mysite.site_cover')->with('user', $this->user);

    }

    public function mySiteSpecialSettings()
    {
        return view('mini::mysite.special')->with('user', $this->user);

    }

    public function CCMessages()
    {
        return view('mini::communications.messages')->with('user', $this->user);
    }

    public function CCMessageCreate()
    {
        return view('mini::communications.create_message')->with('user', $this->user);
    }

    public function CCMessageView($id)
    {
        return view('mini::communications.view_message',compact(['id']))->with('user', $this->user);
    }

    public function CCNotifications()
    {
        return view('mini::communications.notifications')->with('user', $this->user);
    }

    public function CCReviews()
    {
        return view('mini::communications.reviews')->with('user', $this->user);
    }

    public function BtyCv()
    {
        return view('mini::btybug.cv')->with('user', $this->user);
    }

    public function BtyJobs()
    {
        return view('mini::btybug.jobs')->with('user', $this->user);
    }

    public function BtyMarket()
    {
        return view('mini::btybug.market')->with('user', $this->user);
    }

    public function BtyBlog()
    {
        return view('mini::btybug.blog')->with('user', $this->user);
    }
    //////////////////////////////////////////////////// MySite ///////////////////////////////////////////////////////
    public function mySitePages()
    {
        $pages = $this->user->frontPages()->orderBy('sorting')->get();
        return view('mini::mysite.pages')->with(['user' => $this->user, 'pages' => $pages]);
    }

    public function btybug()
    {
        return view('mini::mysite.btybug')->with('user', $this->user);
    }
    public function pagesFunction()
    {
        $pages = $this->user->frontPages()->orderBy('sorting')->get();
        return view('mini::mysite.btybug_pages')->with(['user' => $this->user, 'pages' => $pages]);
    }
    public function settingsFunction()
    {
        return view('mini::mysite.btybug_settings')->with('user', $this->user);
    }
    public  function moreSites()
    {
        return view('mini::mysite.moresites')->with('user', $this->user);
    }
    public  function pagesDelete()
    {
        $id = $this->request->id;
        FrontendPage::where('id',$id)->delete();
        $pages = $this->user->frontPages()->orderBy('sorting')->get();
        return $this->responseJson(false,'page is deleted');
    }

    public function getFavourites()
    {
        return view('mini::account.favourites')->with(['user' => $this->user]);
    }

    public function home()
    {
        return view('mini::home.index')->with(['user' => $this->user]);
    }



}