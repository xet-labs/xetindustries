<?php
namespace xet;

class UserAuth {
    private $dbConn;
    private $destUrl;

    public function __construct($DBconf = null, $destUrl = null) {
        $this->dbConn = $DBconf ? __dbConn($DBconf) : $this->dbConn;
		$this->destUrl = $destUrl ?? ($_POST['currentUrl'] ?? '/');
    }

    public function signup($userName, $userEmail, $userPass) {

        if (empty($userName) || empty($userEmail) || empty($userPass)) {
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
						$_SESSION["userId"] = $row["userId"];
						$_SESSION["userUid"] = $row["uid"];

                        util::redirect('login=success', $this->destUrl);
                    }
                } else {
                    util::redirectErr('nouser', $this->destUrl);
                }
            }
        }
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
						$_SESSION["userId"] = $row["userId"];
						$_SESSION["userUid"] = $row["uid"];

                        util::redirect('login=success', $this->destUrl);
                    }
                } else {
                    util::redirectErr('nouser', $this->destUrl);
                }
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        
        util::redirect('logout=success', $this->destUrl);
        exit();
    }
}

?>