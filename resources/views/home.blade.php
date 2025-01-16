<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Job Application Portal</h1>
        <p class="text-center">Please log in or register to continue.</p>

        <div class="d-flex justify-content-center mt-4">
            <!-- Link to Login Page -->
            <a href="{{ route('login') }}" class="btn btn-primary me-3">Login</a>
            
            <!-- Link to Register Page -->
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        </div>
    </div>
</body>
</html>
