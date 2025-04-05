<?php
    class User {
        public object $db;
        

        public function __construct(object $db) {
            $this->db = $db;
        }


        private function validatePassword(string $pwd) : bool {
            $match_password = preg_match("#^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}$#", $pwd);
            $check_length = strlen($pwd) >= 8;
            if($match_password && $check_length) {
                return true;
            } else {
                return false;
            }
        }

        private function validateUsername(string $username) : bool {
            $match_username = preg_match("#^[A-Za-z]\w*$#", $username);
            if($match_username) {
                return true;
            } else {
                return false;
            }
        }

        private function checkAvailable(string $username, string $email): bool {
            $sql_query = "SELECT username, email FROM user WHERE username = ? OR email = ?";
            $prepared_statement = $this->db->prepare($sql_query);
            $form_data = array($username, $email);
            try {
                $prepared_statement->execute($form_data);
            } catch(Exception $e) {
                trigger_error(
                    "
                    <p>You tried to run this sql query: $sql_query</p>
                    <p>{$e->getMessage()}</p>
                    "
                );
            }
            if($prepared_statement->rowCount() === 0) {
                return true;
            } else {
                return false;
            }
        }

        public function createNewUser(string $username, string $email ,string $password) {
            $valid_username = $this->validateUsername($username);
            $valid_pwd = $this->validatePassword($password);
            $valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($valid_username && $valid_pwd && $valid_email) {
                $user_not_available = $this->checkavailable($username, $email);
                if($user_not_available) {
                    $sanitized_username = htmlspecialchars($username);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql_query = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
                    $prepared_statement = $this->db->prepare($sql_query);
                    $form_data = array($sanitized_username, $email, $hashed_password);
                    try {
                        $prepared_statement->execute($form_data);
                    } catch(Exception $e) {
                        trigger_error("<p
                            You tried to run this sql query: $sql_query
                        </p>
                        <p>Exception: {$e->getMessage()}</p>");
                    }   
                } else {
                    throw new Exception("Username or email already exists");
                }
            } else {
                throw new Exception("Username or password or email is invalid or username or password is less than 8 characters");
            }

        }

        // public function loginUser(string $username, string $password) {

        // }
    }
?>