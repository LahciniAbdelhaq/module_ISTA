<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
        return [
            'code_module' => 'required|unique:modules,code_module,code_module,code_module',
            'nom_module' => 'required|string|min:6',
            'regionale' => 'required',
            'mh_presentiel' => 'required|integer',
            'mh_distance' => 'required|integer',
            'nombre_total' => 'required|integer',
        ];
    }
}
