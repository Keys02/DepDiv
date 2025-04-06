<?php
    require_once "models/Entity.php";
    class User extends Entity{

        private function validatePassword(string $pwd) : bool {
            $match_password = preg_match("#^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}$#", $pwd); // Check if there is at least one uppercase, lowercase and one of these special characters (!@_-)
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
            $sql_query = "SELECT username, email FROM user WHERE username = ? OR email = ?;";
            $form_data = array($username, $email);
            $prepared_statement = self::executeSQLQuery($sql_query, $form_data);
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
                    $sql_query = "INSERT INTO user (username, email, password) VALUES (?, ?, ?);";
                    $form_data = array($sanitized_username, $email, $hashed_password);
                    self::executeSQLQuery($sql_query, $form_data) ;
                } else {
                    throw new Exception("Username or email already exists");
                }
            } else {
                throw new Exception("Username or password or email is invalid or username or password is less than 8 characters");
            }

        }

        public function checkCredentials(string $username, string $password) {
            $sql_query = "SELECT username, email, password FROM user WHERE username = ?;";
            $form_data = array($username);
            $prepared_statement = self::executeSQLQuery($sql_query, $form_data);

            if($prepared_statement->rowCount() === 1) {
                $user_data_from_db = $prepared_statement->fetchObject();
                if(password_verify($password, $user_data_from_db->password)) {
                    return "Login successful";
                } else {
                    return "Password is incorrect";
                }
            } else {
                return "Username is invalid";
            }
        }
    }
?>