<?php
    class UserSession {
        public function __construct() {
            session_start();
        }
        
        public function userIsLoggedIn() {
            if(isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) {
                return true;
            } else {
                return false;
            }
        }

        public function getLoggedInUser(): int {
            return $_SESSION['logged-in-user'];
        }

        public function logIn(int $user_id): void {
            $_SESSION['logged-in'] = true;
            $_SESSION['logged-in-user'] = $user_id;
        }

        public function logOut() : void {
            session_unset();
        }
    }
?>