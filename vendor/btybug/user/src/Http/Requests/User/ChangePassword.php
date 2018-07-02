<?php
/**
 * Created by PhpStorm.
 * User: Ara Arakelyan
 * Date: 7/20/2017
 * Time: 4:28 PM
 */

namespace Btybug\User\Http\Requests\User;

use Btybug\btybug\Http\Requests\Request;

class ChangePassword extends Request
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
        return [
            'old_pass' => 'required',
            'new_pass' => 'required|min:6|max:255',
            'confirm_pass' => 'required|min:6|max:255|same:new_pass',
        ];
    }

}