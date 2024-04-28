<?php
class ChartModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function countUserTypes()
    {   
        // Define the SQL query to count occurrences of each user type where is_deleted is 0
        $query = "SELECT user_type, COUNT(*) as total_count FROM users WHERE is_deleted = 0 GROUP BY user_type";

        // Prepare and execute the query
        $this->db->query($query);
        $results = $this->db->resultSet();

        // Initialize an array to store the counts
        $userTypeCounts = [];

        // Iterate through the results and store the counts in the array
        foreach ($results as $result) {
            $userType = $result->user_type;
            $totalCount = $result->total_count;
            $userTypeCounts[] = $totalCount;
        }
        
        return $userTypeCounts;
    }

    public function countByFaculty(){
        // Define the SQL query to count occurrences of each faculty where is_deleted is 0
        $query = "SELECT faculty, COUNT(*) as total_count FROM undergraduate WHERE is_deleted = 0 GROUP BY faculty";

        // Prepare and execute the query
        $this->db->query($query);
        $results = $this->db->resultSet();

        // Initialize an array to store the counts
        $facultyCounts = [];

        // Iterate through the results and store the counts in the array
        foreach ($results as $result) {
            $faculty = $result->faculty;
            $totalCount = $result->total_count;
            $facultyCounts[$faculty] = $totalCount;
        }
        
        return $facultyCounts;
    }

    public function countMonthlyUsers(){
        // Define the SQL query to count occurrences of users for each month where is_deleted is 0
        $query = "SELECT COUNT(*) as total_count, MONTH(created_at) as month, YEAR(created_at) as year
                  FROM users
                  WHERE is_deleted = 0
                  GROUP BY YEAR(created_at), MONTH(created_at)";
    
        // Prepare and execute the query
        $this->db->query($query);
        $results = $this->db->resultSet();
    
        // Initialize an array to store the results
        $monthlyCounts = [];
    
        // Iterate through the results and store the counts in the array
        foreach ($results as $result) {
            // Construct a key for the month and year (e.g., "July 2023")
            $monthYear = date('F Y', strtotime("$result->year-$result->month-01"));
    
            // Store the total count for the month and year
            $monthlyCounts[$monthYear] = $result->total_count;
        }
    
        return $monthlyCounts;
    }

    public function countDailyUsers(){
        // Define the SQL query to count occurrences of users for each day where is_deleted is 0
        $query = "SELECT COUNT(*) as total_count, DAY(created_at) as day, MONTH(created_at) as month
                  FROM users
                  WHERE is_deleted = 0
                  GROUP BY MONTH(created_at), DAY(created_at)";
    
        // Prepare and execute the query
        $this->db->query($query);
        $results = $this->db->resultSet();
    
        // Initialize an array to store the results
        $dailyCounts = [];
    
        // Iterate through the results and store the counts in the array
        foreach ($results as $result) {
            // Construct a key for the month and year (e.g., "3oth July")
            $dayMonth = date('jS F', strtotime("2023-$result->month-$result->day"));
    
            // Store the total count for the day and month
            $dailyCounts[$dayMonth] = $result->total_count;
        }
    
        return $dailyCounts;
    }
    
}
