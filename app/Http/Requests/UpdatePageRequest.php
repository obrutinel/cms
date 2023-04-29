<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'excerpt' => ['sometimes'],
            'content' => ['sometimes'],
            'link_label' => ['sometimes'],
            'link_url' => ['sometimes'],
            'meta_title' => ['sometimes'],
            'meta_desc' => ['sometimes'],
            'is_publish' => ['sometimes', 'boolean'],
            'published_at' => ['sometimes','nullable', 'date_format:d/m/Y'],
            'slug' => [
                'sometimes',
                'max:255',
                Rule::unique('pages')->ignore($this->route()->parameter('page')),
            ]
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_publish' => $this->is_publish ?? false,
            'slug' => $this->input('slug') ?: Str::slug('page-'.$this->route()->parameter('page')->id)
        ]);
    }
}
