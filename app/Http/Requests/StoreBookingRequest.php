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
                'booking_code' => 'required|string',
                'customer_id' => 'required|integer',
                'price' => 'required|numeric|min:0',
                'promocode_id' => 'required|integer',
                'vehicle_reg' => 'required|string',
                'vehicle_manufacturer' => 'nullable|string',
                'vehicle_model' => 'nullable|string',
                'vehicle_color' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'parking_from_date' => 'required|date|date_format:Y-m-d',
                'parking_from_time' => 'required',
                'parking_till_date' =>'required|date|date_format:Y-m-d',
                'parking_till_time' => 'required',
                'inbound_terminal' => 'required|integer',
                'outbound_terminal' => 'required|integer',
                'inbound_flight_number' => 'required|string',
                'outbound_flight_number' => 'required|string',
                'flight_arrival_time' => 'required',
                'flight_arrival_date' => 'required|date|date_format:Y-m-d',
                'flight_departure_time' => 'required',
                'flight_departure_date' => 'required|date|date_format:Y-m-d',
                'airport' => 'required|string',
                'status' => 'required|integer',
        ];
    }
}
