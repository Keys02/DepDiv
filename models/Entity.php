<?php
    class Entity {
        protected static object $db;

        public function __construct(object $db) {
            self::$db = $db;
        }

        public function executeSQLQuery(string $sql_query, ?array $form_data = null) {
            $prepared_statement = self::$db->prepare($sql_query);
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
            return $prepared_statement;
        }
    }
?>