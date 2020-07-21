<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGame extends FormRequest
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
            'name' => 'required|unique:games',
            'server_size' => 'required',
            'version' => 'required',
            'server_location' => 'required',
            'game_type' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.unique' => 'A name should be unique',
            'server_size.required' => 'A server_size is required',
            'server_location.required' => 'A server_location is required'
        ];
    }
}
