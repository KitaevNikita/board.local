<?php

namespace App\Http\Requests;

use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $board = Board::find($this->route('board'));
        if (isset($board)) {
            if (Auth::id() !== $board->user_id) {
                return false;
            }
        }
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
            'user_name' => 'string|required|max:20|min:14',
            'advertisement' => 'required',
            'phone' => 'integer|max:15|min:10',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Требуется вести Автора',
            'user_name.string' => 'В поле Автор требуется заполнить буквами',
            'user_name.max' => 'Поле автора не должно быть больше :max',
            'user_name.max' => 'Поле автора не должно быть меньше :min',
            'advertisement.required' => 'Требуется заполнить поле объявления',
            'phone.integer' => 'Поле номер телефона требуется заполнять цифрами',
            'phone.max' => 'Поле номер телефона не должно быть больше :max',
            'phone.min' => 'Поле номер телефона не должно быть меньше :min',
        ];
    }

}
