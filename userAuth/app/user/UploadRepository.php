<?php 

class UploadRepository
{

    public function upload($id,$file)
    {
        global $conn;

        if($file['is_success'])
        {
            $check = $conn->prepare("SELECT * FROM `user_avatar` WHERE user_id=:user_id");
            $check->execute(['user_id' => $id]); 
            $data = $check->fetch();
            if(!is_null($data['image'])){
                unlink($data['image']);  
                $conn->prepare("DELETE FROM `user_avatar` WHERE user_id=:user_id")
                        ->execute(['user_id' => $id]);
                        
            }
            $add = $conn->prepare("INSERT INTO user_avatar (user_id, image) VALUES (:user_id, :images)");
            $add->bindParam(':user_id', $id);
            $add->bindParam(':images', $file['name']);
            $add->execute();

            header("location: index.php");
        }
    }

}

