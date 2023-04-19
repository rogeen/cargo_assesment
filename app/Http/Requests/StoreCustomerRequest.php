<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCutomerRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'fullname'  => 'required|max:255',
			'phone'     => 'required', //regex:/^\+?\d{1,3}[- ]?\d{9,}$/
			'city_id'   => 'required|exists:cities,id',
        ];
    }
}

?>
