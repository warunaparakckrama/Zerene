<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS; ?>searchbar.css">
    <!-- Add any additional CSS styles for the dropdown -->
</head>

<body>
    <div class="grid-search-2">
        <div class="search-container">
            <form>
                <input type="text" id="searchInput" placeholder="Search.." name="search">
                Add a div to contain the dropdown
                <div id="searchDropdown" class="search-dropdown"></div>
            </form>
        </div>
    </div>

    <!-- <script>
        const searchInput = document.getElementById('searchInput');
        const searchDropdown = document.getElementById('searchDropdown');

        // Add event listener for input changes
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.trim();
            if (searchTerm !== '') {
                // Call a function to fetch search results and display them in the dropdown
                fetchSearchResults(searchTerm);
            } else {
                // Clear the dropdown if search term is empty
                clearDropdown();
            }
        });

        function fetchSearchResults(searchTerm) {
            // Make an AJAX request to fetch search results
            // Replace 'search.php' with the appropriate URL for handling search
            fetch('../controllers/SearchController.php?action=requestLetterResults&q=' + searchTerm)
                .then(response => response.text())
                .then(data => {
                    // Update the dropdown with the fetched search results
                    searchDropdown.innerHTML = data;
                })
                .catch(error => console.error('Error fetching search results:', error));
        }

        function clearDropdown() {
            // Clear the dropdown
            searchDropdown.innerHTML = '';
        }
    </script> -->
</body>

</html>