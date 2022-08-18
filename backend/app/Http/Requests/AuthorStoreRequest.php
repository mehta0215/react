<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|max:255|unique:email',
            'github' => 'required|max:255',
            'twitter' => 'required|max:255',
            'location' => 'required',
            'latest_article_published' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'github.required' => 'Github is required!',
            'twitter.required' => 'Twitter is required!',
            'location.required' => 'Location is required!',
            'latest_article_published.required' => 'Latest Article is required!'
        ];
    }
}
