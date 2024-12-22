<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Handling</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Sign Up</h2>
        <form id="signupForm" class="p-4 border rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
                <small id="usernameError" class="error"></small>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                <small id="emailError" class="error"></small>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                <small id="passwordError" class="error"></small>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" id="terms" name="terms" class="form-check-input">
                <label for="terms" class="form-check-label">I agree with the terms of service</label>
                <small id="termsError" class="error d-block"></small>
            </div>

            <button type="button" id="submitButton" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Event listeners for validation
        document.getElementById('username').addEventListener('blur', function() {
            const username = this.value;
            document.getElementById('usernameError').textContent = username ? '' : 'Username is required.';
        });

        document.getElementById('email').addEventListener('blur', function() {
            const email = this.value;
            document.getElementById('emailError').textContent = email.includes('@') ? '' : 'Email must be valid.';
        });

        document.getElementById('submitButton').addEventListener('click', function() {
            const password = document.getElementById('password').value;
            const terms = document.getElementById('terms').checked;
            let valid = true;

            if (password.length < 6) {
                valid = false;
                document.getElementById('passwordError').textContent = 'Password must be at least 6 characters.';
            } else {
                document.getElementById('passwordError').textContent = '';
            }

            if (!terms) {
                valid = false;
                document.getElementById('termsError').textContent = 'You must agree to the terms.';
            } else {
                document.getElementById('termsError').textContent = '';
            }

            if (valid) {
                alert('Form submitted successfully!');
            }
        });
    </script>
</body>
</html>
