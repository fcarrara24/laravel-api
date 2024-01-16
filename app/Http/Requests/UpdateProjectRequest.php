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
            'image' => ['nullable', 'max:1024', 'mimes:jpg,png,gif'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo non deve superare i :max caratteri',
            'image.max' => 'l\'immagine non puo superare i :max KB',
            'github.url' => 'il sito di riferimento non è scritto in formato valido',
        ];
    }
}
