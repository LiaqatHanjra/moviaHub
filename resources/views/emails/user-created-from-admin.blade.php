<!DOCTYPE html>
<html>
<head>
    <title>Your Account Details</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>

    <p>Your account has been created. Here are your login details:</p>

    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <p>Please log in and change your password at your earliest convenience.</p>

    <p>Thank you!</p>
</body>
</html>
