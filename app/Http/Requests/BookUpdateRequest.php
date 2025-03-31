<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'authors'     => 'sometimes|array', // Добавлено
        'authors.*'   => 'exists:authors,id',
    ];
}

}
