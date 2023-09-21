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
            'maximum' => ['nullable', 'integer'],
            'bench' => ['nullable', 'integer'],
            'rack' => ['nullable', 'integer'],
            'smith' => ['nullable', 'integer'],
            'cable' => ['nullable', 'integer'],
            'chestpress' => ['nullable', 'integer'],
            'pec' => ['nullable', 'integer'],
            'shoulderpress' => ['nullable', 'integer'],
            'sideraise' => ['nullable', 'integer'],
            'armculr' => ['nullable', 'integer'],
            'triceps' => ['nullable', 'integer'],
            'latpul' => ['nullable', 'integer'],
            'rawing' => ['nullable', 'integer'],
            'abcrunch' => ['nullable', 'integer'],
            'triceps' => ['nullable', 'integer'],
            'hacksquat' => ['nullable', 'integer'],
            'legext' => ['nullable', 'integer'],
            'legpress' => ['nullable', 'integer'],
            'tread' => ['nullable', 'integer'],
            'cross' => ['nullable', 'integer'],
            'bike' => ['nullable', 'integer'],
            'image'=>'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image'=>'指定されたファイルが画像ではありません',
            'image.mines'=>'指定された拡張子（jpg/jpeg/png）ではありません',
            'image.max'=>'ファイルサイズは2MB以内にしてください',
            'maximum'=>'台数、重さは半角で数字を入れてください',
            'bench'=>'台数、重さは半角で数字を入れてください',
            'rack'=>'台数、重さは半角で数字を入れてください',
            'smith'=>'台数、重さは半角で数字を入れてください',
            'cable'=>'台数、重さは半角で数字を入れてください',
            'chestpress'=>'台数、重さは半角で数字を入れてください',
            'pec'=>'台数、重さは半角で数字を入れてください',
            'shoulderpress'=>'台数、重さは半角で数字を入れてください',
            'sideraise'=>'台数、重さは半角で数字を入れてください',
            'armcurl'=>'台数、重さは半角で数字を入れてください',
            'triceps'=>'台数、重さは半角で数字を入れてください',
            'latpull'=>'台数、重さは半角で数字を入れてください',
            'rawing'=>'台数、重さは半角で数字を入れてください',
            'abcrunch'=>'台数、重さは半角で数字を入れてください',
            'hacksquat'=>'台数、重さは半角で数字を入れてください',
            'legext'=>'台数、重さは半角で数字を入れてください',
            'legpress'=>'台数、重さは半角で数字を入れてください',
            'tread'=>'台数、重さは半角で数字を入れてください',
            'cross'=>'台数、重さは半角で数字を入れてください',
            'bike'=>'台数、重さは半角で数字を入れてください',
        ];
    }
}
