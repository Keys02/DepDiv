<?php
    require_once "models/Entity.php";

    class Answer extends Entity {
        public function getQuestionAnswers(int $question_id) : object {
            $sql_query = "SELECT answer_id, answer_body, user_id, time_sent, DATE_FORMAT(time_sent, '%b %d %Y') AS 'answer_sent_date'  FROM answer WHERE question_id = ?;";
            $form_data = array($question_id);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            return $exec_sql_stmt;
        }

        public function submitAnswer(string $answer_body, int $question_id, int $user_id) : void {
            $sql_query = "INSERT INTO answer (answer_body, question_id, user_id) VALUES (?, ?, ?);";
            $form_data = array($answer_body, $question_id, $user_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

        public function getAnswer(int $answer_id) : object {
            $sql_query = "SELECT answer_body FROM answer WHERE answer_id = ?;";
            $form_data = array($answer_id);
            $exec_sql_stmt = self::executeSQLQuery($sql_query, $form_data);
            if($exec_sql_stmt->rowCount() === 1) {
                return $exec_sql_stmt->fetchObject();
            } else {
                return new StdClass();
            }
        }
        
        public function updateAnswer(int $answer_id, string $answer_body) : void {
            $sql_query = "UPDATE answer SET answer_body = ? WHERE answer_id = ?;";
            $form_data = array($answer_body, $answer_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

        public function deleteAnswer(int $answer_id) : void {
            $sql_query = "DELETE FROM answer WHERE answer_id = ?;";
            $form_data = array($answer_id);
            self::executeSQLQuery($sql_query, $form_data);
        }

    }
?>