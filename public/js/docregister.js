
    function validateForm(event) {
        event.preventDefault(); // Prevent form submission for this demonstration

        const firstName = document.getElementsByName('fname')[0].value;
        const lastName = document.getElementsByName('lname')[0].value;
        const email = document.getElementsByName('email')[0].value;
        const contact_num = document.getElementsByName('contact_num')[0].value;
        const username = document.getElementsByName('username')[0].value;
        const password = document.getElementsByName('password')[0].value;

        // Validation logic for each field
        if (firstName === '') {
            document.getElementById('fname-error').innerText = 'Enter First Name';
            return false; // Stop form submission if validation fails
        }
        if (lastName === '') {
            document.getElementById('lname-error').innerText = 'Enter Last Name';
            return false; // Stop form submission if validation fails
        }
        if (email === '') {
            document.getElementById('email-error').innerText = 'Enter Email';
            return false; // Stop form submission if validation fails
        }
        if (contact_num === '') {
            document.getElementById('contact_num-error').innerText = 'Enter Contact Number';
            return false; // Stop form submission if validation fails
        }
        if (username === '') {
            document.getElementById('username-error').innerText = 'Enter Username';
            return false; // Stop form submission if validation fails
        }
        if (password === '') {
            document.getElementById('password-error').innerText = 'Enter Password';
            return false; // Stop form submission if validation fails
        }
        // Similarly, add validations for other fields

        // If all validations pass, submit the form (or perform further actions)
        document.getElementById('registration-form').submit();
    }

