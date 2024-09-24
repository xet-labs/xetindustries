<?php


class Logout {
    private $destUrl;

    public function __construct($destUrl = null) {
		$this->destUrl = $destUrl ?? ($_POST['currentUrl'] ?? '/');
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        util::redirect('logout=success', $this->destUrl);
    }
}

?>
