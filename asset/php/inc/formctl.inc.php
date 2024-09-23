<?php
    require_once($FILE['CLS']['__dbctl']);

    if (isset($_POST["submit-signup"])) {
        $signup = new UserAuth($DBconf['XI']);
        $signup->signup($_POST["user-name"],$_POST["user-email"], $_POST["user-pass"]);
    }

    if (isset($_POST["submit-login"])) {
        $login = new UserAuth($DBconf['XI']);
        $login->login($_POST["login-id"], $_POST["login-pass"]);
    }

    if (isset($_POST["submit-logout"])) {
        $logout = new UserAuth();
        $logout->logout();
    }

?>
