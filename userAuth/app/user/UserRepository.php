<?php 

class UserRepository
{

    public function userInfo($id)
    {
        global $conn; 

        $userInfo = $conn->prepare("SELECT users.email,users.name,user_avatar.image 
        FROM `users`
        LEFT JOIN user_avatar 
        ON users.id = user_avatar.user_id WHERE users.id=:id");
        $userInfo->execute(['id'=>$id]);
        
        return $userInfo->fetch();
    }

}

