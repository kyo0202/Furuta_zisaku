<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validation2 extends FormRequest
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
            'first_place' => 'required|numeric',
            'second_place' => 'required|numeric',
            'third_place' => 'required|numeric',
            'win' => 'required|numeric',
            'multiple_wins1' => 'required|numeric',
            'multiple_wins2' => 'required|numeric',
            'multiple_wins3' => 'required|numeric',
            'baren' => 'required|numeric',
            'horse_single' => 'required|numeric',
            'wide1' => 'required|numeric',
            'wide2' => 'required|numeric',
            'wide3' => 'required|numeric',
            'triplets' => 'required|numeric',
            'trio' => 'required|numeric',
        ];
    }
}
