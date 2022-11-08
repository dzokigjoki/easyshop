<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminPostRequest extends Request
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
            'title' => 'required|unique:posts,title,'. $this->get('post_id') .'|max:255',
            'url' => 'required|unique:posts,url,'. $this->get('post_id') .'|max:255',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Полето \'Наслов\' е задолжително!',
            'title.unique' => 'Полето \'Наслов\' мора да е уникатно!',
            'title.max' => 'Полето \'Наслов\' мора да содржи максимум 255 карактери!',
            'url.required' => 'Полето \'URL\' е задолжително!',
            'url.unique' => 'Полето \'URL\' мора да е уникатно!',
            'url.max' => 'Полето \'URL\' мора да содржи максимум 255 карактери!' 
        ];
    }
}
