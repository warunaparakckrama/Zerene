document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    const formElement = document.getElementById('profile-picture-form');
    
    // Check if the form element exists
    if (formElement) {
        // Add an event listener to the form for the 'change' event
        formElement.addEventListener('change', function(event) {
            // Get the selected image source from the radio buttons
            const selectedImage = document.querySelector('input[name="profile-pic"]:checked').value;

            // Define the URL for the server endpoint to handle profile picture updates
            const updateProfilePictureURL = '<?php echo URLROOT; ?>Undergrad/updateUGProfilePic';

            // Create a new XMLHttpRequest for the AJAX request
            const xhr = new XMLHttpRequest();

            // Open a POST request to the server endpoint
            xhr.open('POST', updateProfilePictureURL);

            // Set the request header to indicate that the data being sent is JSON
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Handle the response from the server
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Try parsing the JSON response
                    try {
                        const response = JSON.parse(xhr.responseText);
                        console.log('Response:', response); // Log the parsed response

                        // Check the status of the response
                        if (response.status === 'success') {
                            // Update the displayed profile picture(s) if the update was successful
                            const profilePictures = document.querySelectorAll('.profile-picture');
                            profilePictures.forEach(function(imgElement) {
                                imgElement.src = selectedImage;
                            });
                        } else {
                            // Handle the error case (e.g., display an error message to the user)
                            console.error('Failed to update profile picture:', response.message);
                        }
                    } catch (error) {
                        // Handle JSON parsing error
                        console.error('Failed to parse JSON response:', error);
                    }
                } else {
                    // Handle server error (e.g., display an error message to the user)
                    console.error('Server error:', xhr.status, xhr.statusText);
                }
            };
            

            // Prepare the data to be sent as JSON
            const data = JSON.stringify({
                user_id: user_id, // User's identifier (replace with the actual data)
                imagePath: selectedImage // The chosen profile picture path
            });

            // Send the AJAX request with the data
            xhr.send(data);
        });
    } else {
        console.error('Form element not found.');
    }
});
