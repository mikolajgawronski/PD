<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            "time" => "required",
            "game_id" => "required",
            "meeting_id" => "required",
        ];
    }

    public function messages()
    {
        return [
            "time.required" => "Wymagana godzina rozpoczęcia gry",
            "game_id.required" => "Wymagany wybór gry",
            "meeting_id.required" => "Wymagany wybór spotkania",
        ];
    }
}
