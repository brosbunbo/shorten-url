<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortenUrlCreateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'url' => [
                'required',
                'url'
            ],
            'expired_at' => 'date|after:now|nullable'
        ];

        if (env('SHORTEN_URL_BLACKLIST')) {
            $rules['url'][] = 'not_regex:' . env('SHORTEN_URL_BLACKLIST');
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'url.not_regex' => 'Url is in blacklist'
        ];
    }
}
