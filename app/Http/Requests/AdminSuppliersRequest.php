<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminSuppliersRequest extends Request
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
            'email' => 'required|email',            
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Полето \'Име\' е задолжително!',         
            'email.required' => 'Полето \'email\' е задолжително!',
            'email.email' => 'Полето \'email\' не  е валиден емаил!',
        ];
    }
}
