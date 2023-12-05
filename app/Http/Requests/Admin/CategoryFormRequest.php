<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         $rules= [
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'slug'=>[
                'required',
                'string',
                'max:200'
            ],
            'description'=>[
                'required',
                'string'
    
            ],
            'image'=>[
                'nullable',
                'image'
    
            ],
            
            'meta_title'=>[
                'required',
                'string'
    
            ],

            'meta_keyword'=>[
                'required',
                'string'
    
            ],

            'meta_description'=>[
                'required',
                'string'
    
            ],
            'navbar_status'=>[
                'nullable',
                'boolean'
    
            ],
            'status'=>[
                'nullable',
                
    
            ],

        ];
        return $rules;
    }
}
