<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MeasurementStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'measurement_type_id' => 'required|exists:measurement_types,id',
            'unit_id'=> 'required|exists:units,id' ,
            'value' => 'required',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'notes' => 'nullable',
        ];
    }
}
