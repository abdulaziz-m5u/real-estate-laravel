<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST': {
                return [
                    'name' => 'required',
                    'banner' => ['required', 'image','mimes:jpg,jpeg,png', 'max:2048']
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required',
                    'banner' => ['image', 'mimes:jpg,jpef,png', 'max:2048']
                ];
            }
        }
        
    }
}
