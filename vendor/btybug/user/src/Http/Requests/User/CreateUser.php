<?php
/**
 * Created by PhpStorm.
 * User: hook
 * Date: 6/19/2018
 * Time: 9:55 AM
 */

namespace Btybug\User\Http\Requests\User;
use Btybug\btybug\Http\Requests\Request;

class CreateUser extends Request
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
                'username' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                "membership_id" => 'required'
            ];
       }
       return [];
    }
}