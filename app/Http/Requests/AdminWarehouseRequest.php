<?php

namespace EasyShop\Http\Requests;

use EasyShop\Http\Requests\Request;

class AdminWarehouseRequest extends Request
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
            'title' => 'required',
            'priority' => 'required|unique:warehouses,priority,'.$this->get('warehouse_id')
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Полето \'Име\' е задолжително!',         
            'priority.required' => 'Полето \'Приоритет\' е задолжително!',
            'priority.unique' => 'Полето \'Приоритет\' мора да уникатен број!',
        ];
    }
}
