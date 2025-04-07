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

        public function getLoggedInUser(): string {
            return $_SESSION['logged-in'];
        }

        public function logIn() : void {
            $_SESSION['logged-in'] = true;
        }

        public function setLoggedInUser($username) : void {
            $_SESSION['logged-in-user'] = $username;
        }

        public function logOut() : void {
            $_SESSION['logged-in'] = false;
        }
    }
?>