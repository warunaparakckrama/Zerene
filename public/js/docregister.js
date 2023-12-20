
    function validateForm(event) {
        event.preventDefault(); // Prevent form submission for this demonstration

        const firstName = document.getElementsByName('fname')[0].value;
        const lastName = document.getElementsByName('lname')[0].value;
        const gender = document.getElementsByName('gender')[0].value;
        const hospital = document.getElementsByName('hospital')[0].value;
        const university = document.getElementsByName('university')[0].value;
        const email = document.getElementsByName('email')[0].value;
        const contactNum = document.getElementsByName('contact_num')[0].value;
        const username = document.getElementsByName('username')[0].value;
        const password = document.getElementsByName('password')[0].value;

        // Validation logic for each field
        if (firstName === '') {
            document.getElementById('fname-error').innerText = 'Please enter First Name';
            return false; // Stop form submission if validation fails
        }
        // Similarly, add validations for other fields

        // If all validations pass, submit the form (or perform further actions)
        document.getElementById('registration-form').submit();
    }

