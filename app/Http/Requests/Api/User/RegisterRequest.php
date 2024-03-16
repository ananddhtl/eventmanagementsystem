<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:normal_users,email',
            'phonenumber' => 'required|numeric|unique:normal_users,phonenumber',
            'address' => 'required|string',
            'gender' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(Response::json([
            'status' => false,
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
