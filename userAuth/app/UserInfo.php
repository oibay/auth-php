<?php 

require_once "user/UserRepository.php";

class UserInfo 
{
    private $userInfo;

    public function __construct()
    {
        $this->userInfo = new UserRepository();
    }
    public function userInfo($id)
    {
        return $this->userInfo->userInfo($id);
    }

}
