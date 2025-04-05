<?php
    class UserSession {
        public function __construct() {
            session_start();
        }
        
        public function UserIsLoggedIn() {
            if(isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) {
                return true;
            } else {
                return false;
            }
        }

        public function logIn() {
            $_SESSION['logged-in'] = true;
        }

        public function setLoggedInUser($username) {
            $_SESSION['logged-in-user'] = $username;
        }

        public function logOut() {
            $_SESSION['logged-in'] = false;
        }
    }
?>