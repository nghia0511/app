<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetActivityLogRequest extends FormRequest
{
    const TYPES = ['login','register','logout','update','delete'];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1|max:100',
            'user_id' => 'nullable|integer',
            'type' => 'nullable|string|in:'. implode(',', self::TYPES) .',',
            'order_by' => 'nullable|string',
            'sort' => 'nullable|string|in:desc,asc',
        ];
    }
}
