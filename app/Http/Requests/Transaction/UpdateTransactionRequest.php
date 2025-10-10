<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // TODO: Change when adding roles and permissions
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'description' => [Rule::excludeIf(empty($this->description)), 'string', 'max:500'],
            'amount' => ['required', 'decimal:0,2'],
            'custom_id' => [
                Rule::excludeIf(empty($this->custom_id)),
                'min:3',
                'max:255',
                'string',
                Rule::unique('App\Models\Transaction', 'custom_id')->ignore($this->route('transaction')),
            ],
            'date' => ['required'],
        ];
    }
}
