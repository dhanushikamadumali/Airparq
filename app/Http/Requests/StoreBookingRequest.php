<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
        return [
                'customer_id' => 'nullable|integer',
                'price' => 'required|numeric|min:0',
                'promocode' => 'nullable|string',
                'vehicle_reg' => 'required|string',
                'vehicle_manufacturer' => 'nullable|string',
                'vehicle_model' => 'nullable|string',
                'vehicle_color' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'parking_from_date' => 'nullable|date|date_format:Y-m-d',
                'parking_from_time' => 'nullable|',
                'parking_till_date' =>'nullable|date|date_format:Y-m-d',
                'parking_till_time' => 'nullable',
                'inbound_terminal' => 'nullable|integer',
                'outbound_terminal' => 'nullable|integer',
                'inbound_flight_number' => 'nullable|string',
                'outbound_flight_number' => 'nullable|string',
                'flight_arrival_time' => 'nullable',
                'flight_arrival_date' => 'nullable|date',
                'flight_departure_time' => 'nullable',
                'flight_departure_date' => 'nullable|date',
                'airport' => 'nullable|string',
                'status' => 'nullable|integer',
        ];
    }
}
