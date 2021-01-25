<?php 

require_once "user/UploadRepository.php";

class Upload 
{
    private $uploadRepo;

    public function __construct()
    {
        $this->uploadRepo = new UploadRepository();
    }
    public function upload($id,$request)
    {
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
        
        foreach($blacklist as $item)
        {
            if(preg_match("/$item\$/i", $request['somename']['name'])){
                exit;
            }
            $type = $request['upload']['type'];
            $size = $request['upload']['size'];
            $typeImage = array("image/jpg","image/jpeg","image/png","image/gif","image/pjpeg");
            if (!$type[$typeImage]){
                exit('Incorrect type');
            }
            if ($size > 204090){
                exit('Maximum size 2 MB');
            }
            $uploadfile = "resources/images/".$request['upload']['name'];
            $upload = move_uploaded_file($request['upload']['tmp_name'], $uploadfile);
            if($upload)
            {
                return $this->uploadRepo->upload($id,['is_success'=>true,'name'=>$uploadfile]);
            }
        }
        
        
    }

}
