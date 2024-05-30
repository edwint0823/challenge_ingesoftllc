<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'due_date' => ['required', 'date'],
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')->where(function ($query) {
                $query->where('id', auth()->id());
            }),],
        ];
    }

    public function messages()
    {
        return [
            'user_id.exists' => 'El ID de usuario no coincide con el usuario autenticado.',
        ];
    }
}
