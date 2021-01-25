<?php 

require_once "IValidation.php";

class PasswordValidation implements IValidation 
{
    
    public static function validate($password)
    {
        if (strlen($password) >= 8)
        {
            return true;
        }
        return false;
    }
}