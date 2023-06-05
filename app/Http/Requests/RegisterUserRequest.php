<?php

namespace App\Http\Requests;

class RegisterUserRequest extends UserBaseRequest
{
    public function rules()
    {
        return [
            /**
             * @param Model/User
             */
            "name" => [
                "required"
            ],
            "phone" => [
                "required",
                "min:10",
                "max:10"
            ],
            "email" => [
                "required",
                "email",
                "unique:users,email"
            ]
        ];
    }
}
