<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            "date" => "required",
            "start_time" => "required",
            "end_time" => "required|after:start_time",
        ];
    }

    public function messages()
    {
        return [
            "date.required" => "Wymagana data spotkania",
            "start_time.required" => "Wymagana godzina rozpoczęcia spotkania",
            "end_time.required" => "Wymagana godzina zakończenia spotkania",
            "end_time.after" => "Godzina zakończenia musi być później niż godzina rozpoczęcia",
        ];
    }
}
