document.getElementById('signInButton').addEventListener('click', function() {
    // Example data, replace with your own
    const loginData = {
        username: document.getElementById('username').value,
        password: document.getElementById('password').value
    };

    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    
    // Configure it: POST-request for the URL /login
    xhr.open('POST', '/login', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Set up a function to handle the response data
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Redirect to login.html upon successful login
            window.location.href = './login.html';
        } else {
            // Handle errors here
            console.error('Login failed:', xhr.responseText);
        }
    };

    // Send the request with the login data
    xhr.send(JSON.stringify(loginData));
});

