<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulasi DOM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Sign Up</h2>
        <form id="signupForm" class="p-4 border rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input">
                    <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
                    <label for="female" class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" id="terms" name="terms" class="form-check-input">
                    <label for="terms" class="form-check-label">I agree with the terms of service</label>
                </div>
            </div>

            <button type="button" id="submitButton" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

