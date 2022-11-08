<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminCategoryRequest extends Request
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
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'file' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Полето \'Име на категорија\' е задолжително!',
            'title.unique' => 'Полето \'Име на категорија\' мора да е уникатно!',
            'title.max' => 'Полето \'Име на категорија\' мора да содржи максимум 255 карактери!',
            'url.required' => 'Полето \'URL\' е задолжително!',
            'url.unique' => 'Полето \'URL\' мора да е уникатно!',
            'url.max' => 'Полето \'URL\' мора да содржи максимум 255 карактери!',            
        ];
    }
}
