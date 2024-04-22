<?php

namespace App\Http\Requests\ReadingLog\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|max:100',
            'author' => 'nullable|max:30',
            'picture_name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publisher' => 'nullable|max:30',
            'publication_year' => 'nullable|integer|max:3000',
            'category_id' => 'nullable|integer',
        ];
    }

    public function title(): string{
        return $this->input('title');
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
