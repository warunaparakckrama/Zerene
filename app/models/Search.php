<?php 
    class Search {

        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function searchRequestLetters($searchQuery) {
            // Prepare the SQL query to search for request letters
            $this->db->query("SELECT * FROM request_letter WHERE subject LIKE :searchQuery OR content LIKE :searchQuery");
    
            // Bind the search query parameter
            $this->db->bind(':searchQuery', "%$searchQuery%");
    
            // Execute the query
            $this->db->execute();
    
            // Fetch and return the search results
            return $this->db->resultSet();
        }

        
    }
?>