<?php
    class Counsellor{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function addQuestionnaire($user_id, $data){
            $this->db->query('INSERT INTO questionnaires(questionnaire_name, questionnaire_type, num_of_questions, num_of_answers, user_id) VALUES (:quiz_name, :quiz_type, :num_questions, :num_answers, :user_id)');
            $this->db->bind(':quiz_name', $data['quiz_name']);
            if ($data['quiz_type'] === "general") {
                $this->db->bind(':quiz_type', 'general');
            }
            if ($data['quiz_type'] === "stress") {
                $this->db->bind(':quiz_type', 'stress');
            }
            if ($data['quiz_type'] === "anxiety") {
                $this->db->bind(':quiz_type', 'anxiety');
            }
            if ($data['quiz_type'] === "depression") {
                $this->db->bind(':quiz_type', 'depression');
            }
            if ($data['quiz_type'] === "other") {
                $this->db->bind(':quiz_type', 'other');
            }
            $this->db->bind(':num_questions', $data['num_questions']);
            $this->db->bind(':num_answers', $data['num_answers']);
            $this->db->bind(':user_id', $user_id);

            $addQuiz = $this->db->execute();
            if($addQuiz){
                return true;
            }else{
                return false;
            }
        }

        public function getLastInsertedQuizId(){
            $this->db->query('SELECT MAX(questionnaire_id) as last_id FROM questionnaires');
            $row = $this->db->single();
            return $row->last_id;
        }

        public function addQuestion($questionnaire_id, $questionText){
            $this->db->query('INSERT INTO question(question_text, questionnaire_id) VALUES (:question_text, :questionnaire_id)');
            $this->db->bind(':question_text', $questionText);
            $this->db->bind(':questionnaire_id', $questionnaire_id);

            $addQuestion = $this->db->execute();
            if($addQuestion){
                return true;
            }else{
                return false;
            }
        }

        public function addAnswer($questionnaire_id, $number, $answerText) {
            // Construct the column name for the answer based on the question_number
            // $answer_column = 'answer_' . $number;
        
            // Prepare the SQL query
            $this->db->query('INSERT INTO answer (answer_1, answer_2, answer_3, answer_4, answer_5, questionnaire_id) VALUES (:answer_1, :answer_2, :answer_3, :answer_4, :answer_5, :questionnaire_id)');
        
            // Bind parameters and execute the query
            if ($number === 1) {
                $this->db->bind(':answer_1', $answerText);
            }
            if ($number === 2) {
                $this->db->bind(':answer_2', $answerText);
            }
            if ($number === 3) {
                $this->db->bind(':answer_3', $answerText);
            }
            if ($number === 4) {
                $this->db->bind(':answer_4', $answerText);
            }
            if ($number === 5) {
                $this->db->bind(':answer_5', $answerText);
            }
            $this->db->bind(':questionnaire_id', $questionnaire_id);
        
            // Execute the query
            return $this->db->execute();
        }
        
    }