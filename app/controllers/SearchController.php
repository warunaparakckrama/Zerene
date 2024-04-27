<?php

class SearchController extends Controller
{

    private $searchModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->searchModel = $this->model('Search');
    }

    public function requestLetterResults()
    {
        if (isset($_GET['q'])) {
            // Sanitize the search query to prevent SQL injection
            $searchQuery = htmlspecialchars($_GET['q']);

            // Call the searchRequestLetters method to retrieve search results
            $searchResults = $this->searchModel->searchRequestLetters($searchQuery);

            // Display search results
            if (!empty($searchResults)) {
                // Loop through the search results and display them
                foreach ($searchResults as $result) {
                    echo "<div class='search-result'>";
                    echo "<h3>{$result->subject}</h3>"; // Display the subject
                    echo "<p>{$result->content}</p>"; // Display the content
                    // Display other relevant information as needed
                    echo "</div>";
                }
            } else {
                // If no results found
                echo "No results found.";
            }
        } else {
            // If search query parameter is not set
            echo "No search query provided.";
        }
    }
}
