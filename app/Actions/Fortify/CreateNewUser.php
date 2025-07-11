<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): \App\Models\User
{
    Validator::make($input, [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'middle_initial' => ['nullable', 'string', 'max:1'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
    ])->validate();

    return User::create([
        'name' => ucwords(strtolower($input['last_name'])) . ', ' .
                  ucwords(strtolower($input['first_name'])) . ' ' .
                  strtoupper($input['middle_initial']),
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
    ]);
}
}
