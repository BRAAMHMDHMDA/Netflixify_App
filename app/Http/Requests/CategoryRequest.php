<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->route('category');

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:15',
                Rule::unique('categories', 'name')->ignore($id),
            ],
            'description' => [
                'nullable', 'min:10' , 'max:255'
            ],
            'image' => [
                'nullable','image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            'status' => 'required|in:active,draft',
        ];
    }
}
