<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:98', Rule::unique('projects', 'title')->ignore($this->project)],
            'description' => ['required', 'string', 'max:1000'],
            'technologies' => ['nullable', 'exists:technologies,id'],
            'url' => ['nullable', 'url'],
            'image_path' => ['nullable', 'image', 'max:5120'],
            'type_id' => ['nullable', 'exists:types,id'],
        ];
    }
}
