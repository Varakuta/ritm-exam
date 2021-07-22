<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServerRequest extends FormRequest
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
            'host' => 'required|string',
            'description' => 'string|max:255',
            'api_key' => 'required',
            'api_class' => 'required|string',
            'sort' => 'required|integer',
            'active' => 'integer',
            'user_id' => 'integer'
        ];
    }
}
