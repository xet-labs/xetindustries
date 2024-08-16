<?php
    require_once("../conf/config.php");
    require_once($CLS['__dbctl']);
  
  
    // -user login
    if (isset($_POST["submit-login"])) {
        $login = new Login($DBconf['XI']);
        
        $login->login($_POST["user-id"], $_POST["user-pass"]);
    }

    // -user logout
    if (isset($_POST["submit-logout"])) {
        $logout = new Logout();
        
        $logout->logout();
    }


?>
