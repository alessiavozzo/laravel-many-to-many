<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /* anche qui memorizzo il nome del form nella sessione che però è diverso per ogni campo che devo editare*/
        $this->session()->flash('form-name', "form-edit-{$this->technology->id}");

        return [
            'name' => ['required', 'max:100', Rule::unique('technologies')->ignore($this->technology->id)],
        ];
    }
}
