<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookScheduleRequest extends FormRequest
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
            'starting_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:tommorow'
            ],
            'days_in_week' =>  [
                'array',
                'required',
                'min:0',
                'max:6'
            ],
            'days_in_week.*' => [
                'integer',
                'lte:6'
            ],
            'required_sessions' =>  [
                'numeric',
                'required',
            ]
        ];
    }
}
