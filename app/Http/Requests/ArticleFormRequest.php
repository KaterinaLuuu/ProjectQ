<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class ArticleFormRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'published_at' => $this->published_at === 'on' ? Carbon::now() : null,
            'method' => $this->isMethod("patch"),
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>          'required|max:100|min:5',
            'body' =>           'required',
            'description' =>    'required|max:255',
            'slug' =>           'exclude_if:method,true|unique:App\Models\Article,slug',
            'published_at' =>   'sometimes',
            'photo' =>          'filled| exclude_if:method,true|required',

        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'Невозможно создать уникальную ссылку, поменяйте название',
            'title.required' => 'Не добавлен заголовок',
            'title.max' => 'Заголовок больше необходимой длины',
            'title.min' => 'Загаловок меньше необходимой длины',
            'description.required' => 'Не добавлено описание',
            'body.required' => 'Детальное описание не заполнено',
            'photo.required' => 'Фото не добавлено',
        ];
    }
}
