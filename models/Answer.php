<?php
    require_once "models/Entity.php";

    class Answer extends Entity {
        public function getQuestionAnswers(int $question_id) : object {
            $sql_query = "SELECT answer_body FROM answer WHERE question_id = ?;";
            $form_data = array($question_id);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            return $exec_sql_stmt;
        }

        public function submitAnswer(string $answer_body, int $question_id, int $user_id) : void {
            $sql_query = "INSERT INTO answer (answer_body, question_id, user_id) VALUES (?, ?, ?);";
            $form_data = array($answer_body, $question_id, $user_id);
            self::executeSQLQuery($sql_query, $form_data);
        }
    }
?>