<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            "name" => "required",
            "box" => "required",
            "min_players" => "required|min:1",
            "max_players" => "required||gt:min_players",
            "min_time" => "required|min:1",
            "max_time" => "required|gt:min_time",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Wymagana nazwa gry",
            "box.required" => "Wymagany numer kartonu",
        ];
    }
}
