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
            'first_place' => 'required',
            'second_place' => 'required',
            'third_place' => 'required',
            'win' => 'required',
            'multiple_wins1' => 'required',
            'multiple_wins2' => 'required',
            'multiple_wins3' => 'required',
            'baren' => 'required',
            'horse_single' => 'required',
            'wide1' => 'required',
            'wide2' => 'required',
            'wide3' => 'required',
            'triplets' => 'required',
            'trio' => 'required',
        ];
    }
}
