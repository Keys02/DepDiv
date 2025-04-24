<?php
    require_once "models/Entity.php";
    
    class Question extends Entity{
        
        public function getAllQuestions() : object {
            $sql_query = "SELECT 
                          question_id,
                          question_title, 
                          question_body, 
                          date_created, 
                          question_status,
                          user_id 
                          FROM question 
                          ORDER BY question_id DESC;";
            $exec_sql_stmt = self::executeSQLQuery($sql_query);
            return $exec_sql_stmt;
        }

        public function postNewQuestion(string $question, int $user_id): void {
            $sql_query = "INSERT INTO question (question_body, user_id) VALUES (?, ?);";
            $form_data = array($question, $user_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

        public function getUserQuestions(int $user_id) : object {
            $sql_query = "SELECT 
                          question_id,
                          question_title, 
                          question_body, 
                          date_created, 
                          question_status,
                          user_id 
                          FROM question 
                          WHERE user_id = ?
                          ORDER BY question_id DESC;";
            $form_data = array($user_id);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            return $exec_sql_stmt;
        }

        public function searchQuestion(string $search_query) : object {
            $sql_query = "SELECT
                          question_id, 
                          question_body, 
                          date_created, 
                          question_status 
                          FROM question 
                          WHERE MATCH (question_body)
                          AGAINST(? IN NATURAL LANGUAGE MODE);";

            $form_data = array("$search_query");
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            return $exec_sql_stmt;
        }

        public function getQuestionById(int $question_id) : object {
            $sql_query = "SELECT question_id, question_body, question_status FROM question WHERE question_id = ?;";
            $form_data = array("$question_id");
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);

            if($exec_sql_stmt->rowCount() === 1) {
                return $exec_sql_stmt->fetchObject();
            } else {
                return new stdClass();
            }
        }

        public function updateQuestion(int $question_id, string $question_body) : void {
            $sql_query = "UPDATE question SET question_body = ? WHERE question_id = ?;";
            $form_data = array($question_body, $question_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

        public function closeQuestion(int $question_id) {
            $sql_query = "UPDATE question SET question_status = ? WHERE question_id = ?;";
            $form_data = array(2, $question_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

        public function reopenQuestion(int $question_id) {
            $sql_query = "UPDATE question SET question_status = ? WHERE question_id = ?;";
            $form_data = array(1, $question_id);
            self::executeSQLQuery($sql_query, $form_data);
        }
    }
?>