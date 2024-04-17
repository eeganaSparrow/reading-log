<?php

namespace App\Http\Requests\ReadingLog\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'tytle' => 'required|max:100',
            'author' => 'nullable|max:30',
            'publisher' => 'nullable|max:30',
            'publication_year' => 'nullable|integer|max:3000',
            'category_id' => 'nullable|integer',
        ];
    }

    public function tytle(): string{
        return $this->input('tytle');
    }
    public function author(){
        return $this->input('author');
    }
    public function publisher(){
        return $this->input('publisher');
    }
    public function publication_year(){
        return $this->input('publication_year');
    }
    public function category_id(){
        return $this->input('category_id');
    }
}
