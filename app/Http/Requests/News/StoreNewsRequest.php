<?php

namespace App\Http\Requests\News;

use App\Dtos\News\StoreNewsDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:3000'],
            'category' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'content.required' => 'Konten tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar',
            'image.max' => 'Ukuran file terlalu besar',
            'category' => 'Kategory harus dipilih'
        ];
    }

    public function getDTO(): StoreNewsDTO
    {
        return new StoreNewsDTO($this->validated());
    }
}
