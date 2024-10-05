<?php


class Login {
    private $dbConn;
    private $destUrl;

    public function __construct($DBconf, $destUrl = null) {
        $this->dbConn = __dbConn($DBconf);
		$this->destUrl = $destUrl ?? ($_POST['currentUrl'] ?? '/');
    }

    public function login($userId, $userPass) {

        if (empty($userId) || empty($userPass)) {
            util::redirectErr('emptyfields', $this->destUrl);

        } else {
            $sql = "SELECT * FROM Users WHERE uid=? OR email=?";
            $stmt = mysqli_stmt_init($this->dbConn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                util::redirectErr('dberror');
            
			} else {
                mysqli_stmt_bind_param($stmt, "ss", $userId, $userId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
				if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($userPass, $row["pass"]);
                    
					if ($pwdCheck === false) {
                        util::redirectErr('wrongpwd', $this->destUrl);

                    } else if ($pwdCheck === true) {
						session_start();
						$_SESSION["userId"] = $row["user_id"];
						$_SESSION["userUid"] = $row["uid"];

                        util::redirect('login=success', $this->destUrl);
                    }
                } else {
                    util::redirectErr('nouser', $this->destUrl);
                }
            }
        }
    }
}

?>