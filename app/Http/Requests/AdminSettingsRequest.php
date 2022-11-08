<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminSettingsRequest extends Request
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
            'company_name' => 'required',
            'company_address' => 'required',
            'company_country' => 'required',
            'company_city' => 'required',
        ];
    }
}
