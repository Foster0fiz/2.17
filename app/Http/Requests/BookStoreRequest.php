<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Если авторизация не нужна, возвращаем true
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'authors'     => 'required|array',
            'authors.*'   => 'exists:authors,id',
        ];
    }
}
