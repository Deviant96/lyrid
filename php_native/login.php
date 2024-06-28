<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
        </form>
    </div>
</body>
</html>
