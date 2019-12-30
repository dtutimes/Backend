<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSociety extends FormRequest
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
            'name' => 'required|unique:societies', 
            'category' => 'required', 
            'description' => 'required',  
            'contact_mail' => 'required', 
            'head_incharge' => 'required', 
            'pr_incharge' => 'required',
            'head_contact_number' => 'required', 
            'website' => 'required',
            'pr_contact_number' => 'required',
            'logo' => 'mimes:jpeg,jpg,png|required|max:1000'
        ];
    }
}
