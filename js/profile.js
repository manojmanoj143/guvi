$(document).ready(function() {
    $('#profileForm').submit(function(event) {
        event.preventDefault();
        var formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            dob: $('#dob').val(),
            fathername: $('#fathername').val(),
            mothername: $('#mothername').val(),
            emergency_contact: $('#emergency_contact').val(),
            phone: $('#phone').val()
        };

        $.ajax({
            type: 'POST',
            url: './php/updateprofile.php',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            dataType: 'json'
        })
        .done(function(response) {
            if (response && response.message) {
                $('#message').html('<p>' + response.message + '</p>');
            } else {
                $('#message').html('<p>Success but no message returned from server</p>');
            }
        })
        .fail(function(error) {
            console.error("Error response:", error);
            console.log("Status:", error.status);
            console.log("Status Text:", error.statusText);
            console.log("Response Text:", error.responseText);

            if (error.responseJSON && error.responseJSON.message) {
                $('#message').html('<p>Error: ' + error.responseJSON.message + '</p>');
            } else {
                $('#message').html('<p>An unknown error occurred</p>');
            }
        });
    });
});