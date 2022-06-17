<?php

namespace App\Http\Requests\API\Application;

use App\DTO\API\Application\ApplicationUpdateDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicationUpdateRequest extends FormRequest
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
            'status' => Rule::in(['Active', 'Resolved']),
            'responsible_id' => 'nullable|integer|numeric',
            'comment' => 'string|required_if:status,Resolved',
        ];
    }

    public function getDto(): ApplicationUpdateDTO
    {
        return new ApplicationUpdateDTO(
            $this->get('status'),
            $this->get('responsible_id'),
            $this->get('comment')
        );
    }

    public function messages()
    {
        return [
            'status.in' => 'Выбранное значение [:attribute] является недопустимым',
            'comment.required_if' => 'Поле [:attribute] является обязательным, если значение статуса - Resolved',
            'responsible_id.integer' => '[:attribute] Недопустимое значение',
        ];
    }

    public function attributes()
    {
        return [
            'status' => __('Status'),
            'responsible_id' => __('Responsible person'),
            'comment' => __('Comment'),
        ];
    }
}
