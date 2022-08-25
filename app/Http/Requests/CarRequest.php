<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'category_id' => $this->category_id ?? 13,
            'method' => $this->isMethod("patch"),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'exclude_if:method,true|required',
            'body' => 'exclude_if:method,true|required',
            'price' => 'exclude_if:method,true|required',
            'old_price' => 'exclude_if:method,true|required',
            'car_body_id' => 'exclude_if:method,true|required',
            'category_id' => 'exclude_if:method,true|required',
        ];
    }
}
