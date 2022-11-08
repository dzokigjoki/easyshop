<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminBannerRequest extends Request
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
        $id = $this->get('banner_id');
        if (empty($id)) {
            $rules = [
                'title' => 'required|unique:banners,title,'. $this->get('banner_id') .'|max:255',
                'url' => 'max:255',
                'categories' => 'required',
                'image' => 'required|image',
            ];
        }
        else {
            $rules = [
                'title' => 'required|unique:banners,title,'. $this->get('banner_id') .'|max:255',
                'url' => 'max:255',
                'categories' => 'required',
                'position' => 'required',
                'image' => 'image',
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Полето \'Име на банер\' е задолжително!',
            'title.unique' => 'Полето \'Име на банер\' мора да е уникатно!',
            'title.max' => 'Полето \'Име на банер\' мора да содржи максимум 255 карактери!',
            'url.max' => 'Полето \'URL\' мора да содржи максимум 255 карактери!',
            'image.required' => 'Полето \'Главна слика\' е задолжително!',
            'position.required' => 'Полето \'Позиција \' е задолжително!',
            'categories.required' => 'Полето \'Категорија\' е задолжително!',
        ];
    }
}
