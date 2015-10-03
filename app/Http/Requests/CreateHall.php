<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateHall extends Request
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
        $name = $this->input('name');

        if(isset($name))
        {
            return [
                'name' => 'required',
                'x' => 'required|integer',
                'y'=> 'required|integer'
            ];
        }
        else
        {
            return [
                'name' => 'required',
                'x' => 'required|integer',
                'y'=> 'required|integer'
            ];
            
        }
    }
}
