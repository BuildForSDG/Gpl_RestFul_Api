<?php

/**
 * @OA\Schema(
 *      title="Login request",
 *      description="Loginrequest body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class LoginRequest
{


    /**
     * @OA\Property(
     *      title="email",
     *      description="email",
     *      example="myemail"
     * )
     *
     * @var string
     */
    public $email;


    /**
     * @OA\Property(
     *      title="password",
     *      description="password",
     *      example="mypassword"
     * )
     *
     * @var string
     */
    public $password;
}
