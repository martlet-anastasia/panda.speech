<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UploadFileRequest extends FormRequest
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
            'filenames.*' => 'required|mimes:audio',
        ];
    }

    public function messages()
    {
        return [
            'filenames.*.required' => 'File name is required',
            'filenames.*.mimes' => 'Only :attribute  audio files are supported',
        ];
    }
}
