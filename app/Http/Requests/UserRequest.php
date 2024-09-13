<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        $isUpdateRequest = Route::is('*.update');

        $rules = [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:25',
                Rule::unique('users', 'name')->ignore($id),
            ],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:25',
                Rule::unique('users', 'username')->ignore($id),
            ],
            'email' => [
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'phone_number' => [
                'numeric',
                Rule::unique('users', 'phone_number')->ignore($id),
            ],
            'image' => [
                'nullable','image', 'max:1048576', 'dimensions:min_width=100,min_height=100',
            ],
            'status' => 'required|in:active,inactive',
        ];

        if ($isUpdateRequest){
            return $rules;
        }else{
//            $rules['password'] = $this->passwordRules();
            return $rules;
        }
    }
}
