<?php 
require_once "IValidation.php";

class EmailValidation implements IValidation 
{
    
    public static function validate($email)
    {
        return (filter_var($email,FILTER_VALIDATE_EMAIL)) ? true : false;
    }
}