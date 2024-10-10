<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'slug' => ['required', 'string', 'max:255', 'unique:movies'],
            'title' => ['required', 'string', 'max:255'],
            'publishingYear' => ['required', 'integer'],
            'poster' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
        ];
    }
}
