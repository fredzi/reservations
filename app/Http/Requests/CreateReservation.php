<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateReservation extends Request
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
            'repertoire_id' => 'required|integer',
            'summary' => 'required|integer',
            'customer_first_name' => 'required',
            'customer_last_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|integer',
            'status' => 'required'
        ];
    }
}
