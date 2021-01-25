<?php 

require_once "validation/EmailValidation.php";
require_once "validation/PasswordValidation.php";
require_once "auth/AuthRepository.php";

class Auth 
{
    private $auth;

    public function __construct()
    {
        $this->auth = new AuthRepository;    
    }
    public function signIn($post)
    {
        if(EmailValidation::validate($post['email']))
        {
            $this->auth->signIn($post);
        }else {
            return 1;
        }
    }
    public function signUp($post)
    {
        if(EmailValidation::validate($post['email']) && PasswordValidation::validate($post['password']))
        {
            $this->auth->signUp($post);
        }else {
            echo 'Incorrect email or password must be 8 letter';
        }
    }
}
