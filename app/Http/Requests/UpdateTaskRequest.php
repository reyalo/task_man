<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // sometimes means only invalid when 'title' = null
            'user_id' => 'sometimes|required|exists:users,id',   // very very important
            'title' => 'sometimes|required|max:255',
            'status' => 'sometimes|in:pending,in_progress,completed',
            'submit_time' => 'sometimes',
        ];
    }
}
