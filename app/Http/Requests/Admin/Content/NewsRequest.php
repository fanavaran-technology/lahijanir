<?php

namespace App\Http\Requests\Admin\Content;

use App\Rules\Tag;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        if ($this->isMethod('post')) {
            return [
                'title' => 'required|min:2|max:200',
                'summery' => 'nullable|min:2|max:300',
                'body' => 'required',
                'image' => 'required',
                'published_at' => 'required',
                'tags' => 'nullable',
                'video' => 'nullable|exists:videos,video',
                'is_draft' => 'nullable|in:0,1',
                'is_pined' => 'nullable|in:0,1',
                'is_fire_station' => 'nullable|in:0,1',
                'galleries.*' => 'nullable|image|max:3072|min:1',
                'alts.*' => 'nullable|min:1|max:200'
            ];
        }

        return [
            'title' => 'required|min:2|max:200',
            'summery' => 'nullable|min:2|max:300',
            'body' => 'required',
            'image' => 'nullable',
            'published_at' => 'required',
            'tags' => 'nullable',
            'is_draft' => 'nullable|in:0,1',
            'is_pined' => 'nullable|in:0,1',
            'is_fire_station' => 'nullable|in:0,1',
            'video' => 'nullable|exists:videos,video',
            'galleries.*' => 'nullable|image|max:3072|min:1',
            'alts.*' => 'nullable|min:1|max:200'
        ];
    }

    public function attributes()
    {
        return [
            'galleries.*' => 'تصویر گالری',
            'summery'     => 'خلاصه اخبار',
            'alts.*'      => 'توضیح تصویر'
        ];
    }
}
