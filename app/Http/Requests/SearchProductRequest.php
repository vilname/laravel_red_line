<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $search
 */
class SearchProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'comment' => [
                'required' => 'Поле "поиск" обязательно'
            ],
        ];
    }
}
