<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
                    'photo' =>  ['required', 'image','mimes:jpg,jpeg,png']
                ];
            }
            case 'PUT':
            case 'PATCH': {
               return [
                    'photo' =>  ['image','mimes:jpg,jpeg,png']
                ];
            }
        }
    }
}
