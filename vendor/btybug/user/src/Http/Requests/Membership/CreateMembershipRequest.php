<?php
/**
 * Created by PhpStorm.
 * User: hook
 * Date: 6/19/2018
 * Time: 2:26 PM
 */
namespace Btybug\User\Http\Requests\Membership;
use Btybug\btybug\Http\Requests\Request;
class CreateMembershipRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('POST')) {
            return [
                'name' => 'required|max:100',
                'slug' => 'required|max:255|unique:memberships,slug',
            ];
        }
        return [];
    }
}