<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Validation\Validator;

class EventRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_title'          => 'required|string|min:6',
            'description'       => 'required|string|min:6',
            'event_date'          => 'required',
            'event_time'          => 'required',
            'location'       => 'required',
            'category'       => 'required',
            'thumbnail'       => 'required',
            'total_seats'       => 'required',
            'total_vip_seats'       => 'required',
            'total_public_seats'       => 'required',
            'vip_seats_price'       => 'required',
            'public_seats_price'       => 'required',
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
