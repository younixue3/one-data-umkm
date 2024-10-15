<?php

namespace App\Http\Requests\News;

use App\Dtos\News\UpdateNewsDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:3000']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'content.required' => 'Konten tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar',
            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): UpdateNewsDTO
    {
        return new UpdateNewsDTO($this->validated());
    }
}
