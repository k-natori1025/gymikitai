<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // falseからtrueに変える
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:50'],
            'phone' => ['string', 'max:255'], 
            'twentyfour' => ['boolean'],
            'image'=>'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image'=>'指定されたファイルが画像ではありません',
            'image.mines'=>'指定された拡張子（jpg/jpeg/png）ではありません',
            'image.max'=>'ファイルサイズは2MB以内にしてください',
        ];
    }
}
