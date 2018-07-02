<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace Btybug\Framework\Http\Requests;

use Btybug\btybug\Http\Requests\Request;

class SettingsSaveRequest extends Request
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
        return [];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('jquery_option')) {
                if ($this->file('jquery_version')) {
                    $validatorRule = \Validator::make(['jquery_version' => $this->file('jquery_version')], [
                        'jquery_version' => "required|file:js,min.js"
                    ]);
                    if ($validatorRule->fails()) {
                        $validator->errors()->add('jquery_version', 'File should be css file');
                    }
                }
            } else {
                $validatorRule = \Validator::make(['jquery_url' => $this->get('jquery_url')], [
                    'jquery_url' => "required|url"
                ]);
                if ($validatorRule->fails()) {
                    $validator->errors()->add('jquery_url', 'Jquery URL incorrect');
                }
            }

            if ($this->input('css_option')) {
                $validatorRule = \Validator::make(['css_version' => $this->get('css_version')], [
                    'css_version' => "required|exists:versions,id"
                ]);
                if ($validatorRule->fails()) {
                    $validator->errors()->add('css_version', 'Css incorrect');
                }
            } else {
                $validatorRule = \Validator::make(['css_url' => $this->get('css_url')], [
                    'css_url' => "required|url"
                ]);
                if ($validatorRule->fails()) {
                    $validator->errors()->add('css_url', 'CSS URL incorrect');
                }
            }
        });
    }

}