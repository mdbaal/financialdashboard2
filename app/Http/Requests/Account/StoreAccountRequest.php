<?php

namespace App\Http\Requests\Account;

use App\Enums\CurrencyTypes;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAccountRequest extends FormRequest
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
            'account_name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/', 'max:50', 'unique:App\Models\Account'],
            'account_number' => ['required', 'alpha_num', 'max:50', 'unique:App\Models\Account'],
            'currency' => ['required', Rule::in(CurrencyTypes::getCurrencyOptions('value'))],
        ];
    }
}
