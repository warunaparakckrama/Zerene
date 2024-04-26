<?php
    class Counsellor{
        private $db;

        public function __construct(){
            $this->db = new database;
        }

        public function addQuestionnaire($user_id, $data){
            $this->db->query('INSERT INTO questionnaires(questionnaire_name, questionnaire_type, num_of_questions, num_of_answers, user_id) VALUES (:quiz_name, :quiz_type, :num_questions, :num_answers, :user_id)');
            $this->db->bind(':quiz_name', $data['quiz_name']);
            if ($data['quiz_type'] === "General") {
                $this->db->bind(':quiz_type', 'General');
            }
            if ($data['quiz_type'] === "Stress") {
                $this->db->bind(':quiz_type', 'Stress');
            }
            if ($data['quiz_type'] === "Anxiety") {
                $this->db->bind(':quiz_type', 'Anxiety');
            }
            if ($data['quiz_type'] === "Depression") {
                $this->db->bind(':quiz_type', 'Depression');
            }
            if ($data['quiz_type'] === "Other") {
                $this->db->bind(':quiz_type', 'Other');
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
            // Check if there is already a row for this questionnaire_id
            $this->db->query('SELECT * FROM answer WHERE questionnaire_id = :questionnaire_id');
            $this->db->bind(':questionnaire_id', $questionnaire_id);
            $existingRow = $this->db->single();
        
            if (!$existingRow) {
                // If no row exists, create a new row
                $this->db->query('INSERT INTO answer (questionnaire_id) VALUES (:questionnaire_id)');
                $this->db->bind(':questionnaire_id', $questionnaire_id);
                $this->db->execute();
            }
        
            // Update the existing row with the answer
            $updateQuery = 'UPDATE answer SET ';
            $updateQuery .= 'answer_' . $number . ' = :answer_text ';
            $updateQuery .= 'WHERE questionnaire_id = :questionnaire_id';
        
            $this->db->query($updateQuery);
            $this->db->bind(':answer_text', $answerText);
            $this->db->bind(':questionnaire_id', $questionnaire_id);
        
            // Execute the query
            return $this->db->execute();
        }
        
        public function addRange($questionnaire_id, $minRange, $maxRange, $rangeName, $m_factor){
            $this->db->query('INSERT INTO quiz_range (min_value, max_value, range_name, multiply_by, questionnaire_id) VALUES (:min_value, :max_value, :range_name, :multiply_by, :questionnaire_id)');
            $this->db->bind(':min_value', $minRange);
            $this->db->bind(':max_value', $maxRange);
            $this->db->bind(':range_name', $rangeName);
            $this->db->bind(':multiply_by', $m_factor);
            $this->db->bind(':questionnaire_id', $questionnaire_id);
            $this->db->execute();
        }
        
    }