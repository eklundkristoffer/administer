<?php

namespace Administer\Http\Requests\Auth;

use Facades\Administer\Administer;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $user = Administer::user();

        return [
            $user->administerUsername() => ['required'],
            $user->administerPassword() => ['required'],
        ];
    }
}
