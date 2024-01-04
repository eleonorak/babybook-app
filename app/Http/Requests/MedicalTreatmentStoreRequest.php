<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicalTreatmentStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'medical_treatment_type_id' => 'required|exists:medical_treatment_types,id',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'notes' => 'nullable',
        ];
    }
}
