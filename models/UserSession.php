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

        // public function AdminIsLoggedIn(){
        //     if(isset($_SESSION['admin-logged-in']) && $_SESSION['admin-logged-in'] === true) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        public function getLoggedInUser(): int {
            return $_SESSION['logged-in-user'];
        }

        // public function getLoggedInAdmin(): int {
        //     return $_SESSION['logged-in-admin'];
        // }

        public function logIn(int $user_id): void {
            $_SESSION['logged-in'] = true;
            $_SESSION['logged-in-user'] = $user_id;
        }

        // public function logInAdmin(int $user_id) : void {
        //     $_SESSION['admin-logged-in'] = true;
        //     $_SESSION['logged-in-admin'] = $user_id;
        // }

        public function logOut() : void {
            $_SESSION['logged-in'] = false;
            $_SESSION['logged-in-admin'] = null;
        }

        // public function logOutAdmin(): void {
        //     $_SESSION['admin-logged-in'] = false;
        //     $_SESSION['logged-in-admin'] = null;
        // }
    }
?>