<?php 
 ob_start();
 session_start();
 require_once "../app/database/pdo.php";
 require_once "../app/Auth.php";
 require_once "../app/UserInfo.php";
 require_once "../app/Upload.php";
 require_once "../app/Language.php";
 if(!isset($_SESSION['id']))
 {
        switch($_GET['page'])
        {
            case 'login':
                require_once "resources/views/login.html";
            break;
            
            case 'registration':
                require_once "resources/views/registration.html";
            break;

            case 'sign_in':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $auth = new Auth();
                    $auth->signIn($_POST);
                }
            break;

            case 'sign_up':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $auth = new Auth();
                    $auth->signUp($_POST);
                }
            break;
            default:
                require_once "resources/views/login.html";  
            break;
        }
 }else {
    $userInfo = new UserInfo;
    $user = $userInfo->userInfo($_SESSION['id']);
    if($_GET['upload'] == 'image')
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $upload = new Upload();
            $upload->upload($_SESSION['id'],$_FILES);
        } 
    }
    if($_GET['logout'] == 1)
    {
        session_destroy();
        header("location:".$_SERVER['HTTP_REFERER']);
    } 
    require_once "resources/views/profile.html";
 }

 
?>
