<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentRequest extends FormRequest
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
            "game_id" => "required",
            "max_players" => "required",
            "date" => "required",
            "time" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Wymagana nazwa turnieju",
            "game_id.required" => "Należy wybrać grę",
            "max_players.required" => "Wymagana maksymalna liczba graczy",
            "date.required" => "Wymagana data turnieju",
            "time.required" => "Wymagana godzina rozpoczęcia turnieju",
        ];
    }
}
