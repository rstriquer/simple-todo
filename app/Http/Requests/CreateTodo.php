<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTodo extends FormRequest
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
            'done' => 'required|in:yes,no,true,false,0,1',
            'task' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'done.required' => 'Field "done" must be present on query',
            'done.in' => 'Field "done" must be exactly one of the following values: "yes", "no", "true", "false", "0", "1"',
            'task.required' => 'Field "task" must be present on query',
        ];
    }
}
