<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetDoneTodo extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task' => 'required|exists:App\Models\Todo,id',
        ];
    }

    public function messages() {
        return [
            'task.required' => 'Field "task" must be present on query',
            'task.exists' => 'Field "task" must be a valid task identification code',
        ];
    }
}
