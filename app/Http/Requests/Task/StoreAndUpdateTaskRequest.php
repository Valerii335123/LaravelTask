<?php

namespace App\Http\Requests\Task;

use App\Enums\Task\TaskStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreAndUpdateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['min:3', 'max:255'],
            'description' => ['min:3'],
            'status' => [new Enum(TaskStatusType::class)],
        ];
    }
}
