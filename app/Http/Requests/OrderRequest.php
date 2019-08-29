<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id'      => 'required',
            'resturant_id' => 'required',
            'item_ids'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required'      => 'the User is required',
            'resturant_id.required' => 'You Must choose a resturant to order something!',
            'item_ids.required'     => 'No one orders nothing!!!',
        ];
    }
}
