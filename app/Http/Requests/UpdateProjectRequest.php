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
            'title' => ['required', 'min:3', 'max:200', Rule::unique('projects')->ignore($this->project)],
            'body' => ['nullable'],
            'github' => ['nullable', 'url'],
            'image' => ['nullable', 'url'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo non deve superare i :max caratteri',
            'image.url' => 'Il link immagine non è valido',
            'github.url' => 'il sito di riferimento non è scritto in formato valido',
        ];
    }
}
