<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:200', 'unique:projects'],
            'body' => ['nullable'],
            'image' => ['nullable', 'max:1024', 'mimes:jpg,png,gif'],
            'github' => ['nullable', 'url'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'type_id' => ['nullable', 'exists:categories,id'],
        ];
    }
    public function messages()
    {
        return [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo non deve superare i :max caratteri',
            'image.max' => 'l\'immagine deve essere massimo di :max KB',
            'github.url' => 'Il link di github non è in formato valido',
        ];
    }
}
