<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $comment
 */
class ReviewStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => ['required'],
            'images' => ['max:3'],
            'images.*' => ['image']
        ];
    }

    public function messages()
    {
        return [
            'comment' => [
                'required' => 'Поле "комментарий" обязательно'
            ],
            'images' => [
                'image' => 'Файл должен быть изображением',
                'max' => 'Не более 3-х изображений'
            ]
        ];
    }
}
