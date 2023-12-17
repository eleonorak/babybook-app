<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeedingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
           // 'measurable' => 'required|in:1,0',
            'feeding_type_id' => 'required|exists:feeding_types,id',
            'quantity' => 'required_if:measurable,1',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'notes' => 'nullable',
        ];
    }
}
