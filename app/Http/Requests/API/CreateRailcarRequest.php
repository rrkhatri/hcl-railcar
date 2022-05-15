<?php

namespace App\Http\Requests\API;

use App\Models\Railcar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRailcarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'         => ['required', 'string', 'min:3', 'max:255'],
            'area'         => ['required', Rule::in(Railcar::areas())],
            'status'       => ['required', Rule::in(Railcar::statuses())],
            'arrival_date' => ['required', 'date', 'date_format:Y-m-d\Th:i', 'after:now'],
            'due_date'     => ['required', 'date', 'date_format:Y-m-d\Th:i', 'after:now'],
        ];
    }

    public function persist()
    {
        return Railcar::create($this->validated());
    }
}
