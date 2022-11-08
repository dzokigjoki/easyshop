<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminArticleRequest extends Request
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
        $rules = [
            'title' => 'required|unique:products,title,'. $this->get('product_id') .'|max:255',
            'url' => 'required|unique:products,url,'. $this->get('product_id') .'|max:255',
            'type' => 'required',
            'unit_code'=>'|unique:products,unit_code,'. $this->get('product_id'),
            'sku'=>'|unique:products,sku,'. $this->get('product_id'),
            // 'minimum_stock' => 'required',
            'minimum_stock_alert' => 'required',
            'warranty_months' => 'required',         
            'vat' => 'required',
            'price_retail_1' => 'required',
             // TODO: max file size e.g. max:10000 => 10000kb
            'image' => 'image',
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Полето \'Име на артикал\' е задолжително!',
            'title.unique' => 'Полето \'Име на артикал\' мора да е уникатно!',
            'title.max' => 'Полето \'Име на артикал\' мора да содржи максимум 255 карактери!',
            'url.required' => 'Полето \'URL\' е задолжително!',
            'url.unique' => 'Полето \'URL\' мора да е уникатно!',
            'url.max' => 'Полето \'URL\' мора да содржи максимум 255 карактери!',
            //'sku.required' => 'Полето \'Баркод\' е задолжително!',
            'type.required' => 'Полето \'Тип\' е задолжително!',
            // 'minimum_stock.required' => 'Полето \'Минимална залиха\' е задолжително!',
            'minimum_stock_alert.required' => 'Полето \'Известување за недостаток на залиха\' е задолжително!',
            'warranty_months.required' => 'Полето \'Гаранција\' е задолжително!',
            'vat.required' => 'Полето \'Данок\' е задолжително!',
            'price_retail_1.required' => 'Полето \'Малопродажна 1\' е задолжително!',
            'price_diners_24.required' => 'Полето \'Diners 24 рати\' е задолжително!',
            'manufacturer.required' => 'Полето \'Производител\' е задолжително!',
            'categories.required' => 'Полето \'Категорија\' е задолжително!',
            'short_description.required' => 'Полето \'Краток опис\' е задолжително!',
        ];
    }
}
