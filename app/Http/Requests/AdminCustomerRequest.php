<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;
use EasyShop\Models\Settings;

class AdminCustomerRequest extends Request
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

        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'address_shiping' => 'required',
            ];
        }
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'address_shiping' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Полето \'Име\' е задолжително!',
            'last_name.required' => 'Полето \'URL\' е задолжително!',

        ];
    }
}
