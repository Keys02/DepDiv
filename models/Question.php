<?php
    require_once "models/Entity.php";
    class Question extends Entity{
        public function getAllQuestions() : object {
            $sql_query = "SELECT question_id, question_body, date_created, question_status FROM question ORDER BY question_id DESC;";
            $exec_sql_stmt = self::executeSQLQuery($sql_query);
            return $exec_sql_stmt;
        }

        public function postNewQuestion(string $question, int $user_id): void {
            $sql_query = "INSERT INTO question (question_body, user_id) VALUES (?, ?);";
            $form_data = array($question, $user_id);
            self::executeSQLQuery($sql_query, $form_data);
        }
    }
?>