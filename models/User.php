<?php
    require_once "models/Entity.php";

    class User extends Entity{

        private function validatePassword(string $pwd, string $confirm_pwd) : bool {
            if($pwd === $confirm_pwd) {
                $match_password = preg_match("#^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}$#", $pwd); // Check if there is at least one uppercase, lowercase and one of these special characters (!@_-)
                $check_length = strlen($pwd) >= 8;
                if($check_length) {
                    if($match_password) {
                        return true;
                    } else {
                        throw new Exception("Password must contain uppercase, lowercase and one of these special characters [!@_-]");
                    }
                } else {
                    throw new Exception("Password is less than 8 characters");
                }
            } else {
                throw new Exception("Password is different from the first entered password");
            }
        }

        private function validateUsername(string $username) : bool {
            $match_username = preg_match("#^[A-Za-z]\w{3,30}$#", $username);
            if($match_username) {
                return true;
            } else {
                throw new Exception("Username should only start with an alphabet");
            }
        }

        private function checkAvailable(string $username, string $email): bool {
            $sql_query = "SELECT username, email FROM user WHERE username = ? OR email = ?;";
            $form_data = array($username, $email);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            if($exec_sql_stmt->rowCount() === 0) {
                return true;
            } else {
                return false;
            }
        }

        public function createNewUser(string $username, string $email ,string $password, string $confirm_password, string $role) {
            $valid_username = $this->validateUsername($username);
            $valid_pwd = $this->validatePassword($password, $confirm_password);
            $valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($valid_username && $valid_pwd && $valid_email) {
                $user_not_available = $this->checkavailable($username, $email);
                if($user_not_available) {
                    $sanitized_username = htmlspecialchars($username);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    if($role === "admin") {
                        $sql_query = "INSERT INTO user (username, email, password, role_id) VALUES (?, ?, ?, ?);";
                        $form_data = array($sanitized_username, $email, $hashed_password, 2);
                    } else {
                        $sql_query = "INSERT INTO user (username, email, password, role_id) VALUES (?, ?, ?, ?);";
                        $form_data = array($sanitized_username, $email, $hashed_password, 1);
                    }
                    self::executeSQLQuery($sql_query, $form_data) ;
                } else {
                    throw new Exception("Username or email already exists");
                }
            } else {
                throw new Exception("Username or password or email is invalid or username or password is less than 8 characters");
            }

        }

        public function loginUser(string $username, string $password): string {
            $sql_query = "SELECT user_id, password FROM user WHERE username = ?;";
            $form_data = array($username);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);

            if($exec_sql_stmt->rowCount() === 1) {
                $user_data_from_db = $exec_sql_stmt->fetchObject();
                if(password_verify($password, $user_data_from_db->password)) {
                    require_once "models/UserSession.php";
                    $user_login_session = new UserSession();
                    $user_login_session->logIn($user_data_from_db->user_id);
                    return "Login successful";
                } else {
                    return "Password is incorrect";
                }
            } else {
                return "Username is invalid";
            }
        }

        public function getUserRole(int $user_id) {
            $sql_query = "SELECT role_id FROM user WHERE user_id = ?;";
            $form_data = array($user_id);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);

            if($exec_sql_stmt->rowCount() === 1) {
                $user_role_db = $exec_sql_stmt->fetchObject();
                return $user_role_db;
            }
        }

        public function uploadAvatar(string $avatar_img_name, int $user_id) {
            $sql_query = "UPDATE user SET avatar = ? WHERE user_id = ?;";
            $form_data = array($avatar_img_name, $user_id);
            self::executeSQLQuery($sql_query, $form_data);
        }
    }
?>