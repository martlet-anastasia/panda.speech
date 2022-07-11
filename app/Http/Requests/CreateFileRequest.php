<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateFileRequest extends FormRequest
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
        return [
            'audiofiles.*' => 'required|mime:mp3,mp4,wav,flac|max:5210',
        ];
    }

    public function messages()
    {
        return [
            'audiofiles.*.required' => 'File name is required',
            'audiofiles.*.mimetypes' => 'Only audio files of types mp3, mp4, wav and flac are supported',
            'audiofiles.*.max' => 'Maximum file size is 5 Mb',
        ];
    }
}
