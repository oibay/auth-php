<?php 

class AuthRepository
{

    public function signIn($request)
    {
        global $conn;

        $password = password_hash($request['password'],PASSWORD_DEFAULT);
        $check = $conn->prepare("SELECT id,email,password FROM `users` WHERE email=:email");
        $check->execute(['email' => $request['email']]); 
        $checkEmail = $check->fetch();

        if($checkEmail['email'] == $request['email']){
            if(password_verify($request['password'],$password)){
                $_SESSION['id'] = $checkEmail['id'];
                header("location: /");
            }
        } 
    }

    public function signUp($request)
    {
        global $conn;
        
        $check = $conn->prepare("SELECT * FROM `users` WHERE email=:email");
        $check->execute(['email' => $request['email']]); 
        $checkEmail = $check->rowCount();
        if($checkEmail > 0){
         
        }else {

            $add = $conn->prepare("INSERT INTO users (name, email,password) VALUES (:name, :email, :password)");
            $add->bindParam(':name', $request['name']);
            $add->bindParam(':email', $request['email']);
            $add->bindParam(':password', password_hash($request['password'],PASSWORD_DEFAULT));
            if($add->execute())
            {
                header("location:?page=login");
            }
            
        }

    }
    
    public function userInfo($id)
    {
        $userInfo = $conn->prepare("SELECT id,email,password FROM `users` WHERE id=:id");
        $userInfo->execute(['id'=>$id]);
        return $userInfo->fetch();
    }

}