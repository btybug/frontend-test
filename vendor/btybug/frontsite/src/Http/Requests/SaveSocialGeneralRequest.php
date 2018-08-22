<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

/**
 * Created by PhpStorm.
 * User: Ara Arakelyan
 * Date: 7/19/2017
 * Time: 3:40 PM
 */

namespace Btybug\FrontSite\Http\Requests;

use Btybug\btybug\Http\Requests\Request;

class SaveSocialGeneralRequest extends Request
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
                'gender' => 'required',
                'site_name' => 'required|max:100',
                'display_email' => 'required|unique:social_profile,display_email,' . $this->id
            ];
        }
        return [];
    }

    public function withValidator($validator)
    {
//        $validator->after(function ($validator) {
//            if ($this->layout_id && ContentLayouts::findVariation($this->layout_id)) {
//                $validator->errors()->add('layout_id', 'Page Section not found  !!!');
//            }
//        });
    }
}