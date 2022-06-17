<?php

namespace App\Http\Requests\API\Application;

use App\DTO\API\Application\ApplicationCreateDTO;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationCreateRequest extends FormRequest
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
        return [
            'name' => 'bail|required|min:4|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ];
    }

    public function getDto(): ApplicationCreateDTO
    {
        return new ApplicationCreateDTO(
            $this->get('name'),
            $this->get('email'),
            $this->get('message'));
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле [:attribute] является обязательным',
            'email.required' => 'Поле [:attribute] является обязательным',
            'message.required' => 'Поле [:attribute] является обязательным',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('User name'),
            'email' => __('Email address'),
            'message' => __('Message'),
        ];
    }
}
