<?php
    require_once("../conf/config.php");
    require_once($CLS['__dbctl']);

    if (isset($_POST["submit-signup"])) {
        $signup = new Signup($DBconf['XI']);
        $signup->signup($_POST["user-name"],$_POST["user-email"], $_POST["user-pass"]);
    }

    if (isset($_POST["submit-login"])) {
        $login = new Login($DBconf['XI']);
        $login->login($_POST["user-id"], $_POST["user-pass"]);
    }

    if (isset($_POST["submit-logout"])) {
        $logout = new Logout();
        $logout->logout();
    }

?>
