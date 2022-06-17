<?php

namespace App\Http\Requests\API\Application;

use App\DTO\API\Application\ApplicationFilterDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicationFilterRequest extends FormRequest
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
            'status' => 'nullable|' .Rule::in(['Active', 'Resolved']),
            'created_at' => 'nullable|string'
        ];
    }

    public function getDto(): ApplicationFilterDTO
    {
        return new ApplicationFilterDTO(
            $this->get('status'),
            $this->get('created_at'));
    }
}
