<?php

namespace App\Http\Requests\ReadingLog\Memo;

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
            'page_number' => 'nullable|integer|max:3000',
            'content' => 'required|string|max:3000',
        ];
    }
    public function page_number(){
        return $this->input('page_number');
    }
    public function content(){
        return $this->input('content');
    }
}
