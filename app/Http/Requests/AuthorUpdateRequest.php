<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Получаем id текущего автора из маршрута (при использовании Route Model Binding)
        $authorId = $this->route('author')->id;
        return [
            'name'  => 'required|string|max:255',
            'bio'   => 'nullable|string',
            'email' => 'required|email|unique:authors,email,' . $authorId,
            'books' => 'array',
            'books.*' => 'exists:books,id',
        ];
    }
}
