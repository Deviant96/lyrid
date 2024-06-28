<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form {
            max-width: 320px;
            width: 90%;
            background-color: #f7f7f7;
            padding: 40px;
            border-radius: 4px;
            transform: translate(-50%, -50%);
            position: absolute;
            top: 50%;
            left: 50%;
            box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
        }

        form .form-image {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        form .form-image i {
            color: #b3b3b3;
            font-size: 72px;
            border-radius: 999px;
            background: white;
            padding: 20px;
        }

        form .form-control {
            background: none;
            border: none;
            border-bottom: 1px solid #c8c8c8;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
        }

        form .form-control:focus {
            background: none;
            box-shadow: none;
        }

        form .btn-primary {
            background: #215caa;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: none;
            transition: all .3s ease;
            width: 100%;
        }

        form .btn-primary:hover {
            background: #214a80;
        }

        form .btn-primary:hover,
        form .btn-primary:active {
            background: #214a80;
            outline: none;
        }

        form .btn-primary:active {
            transform: translateY(1px);
        }

        .register-here {
            margin-top: 10px;
            text-align: center;
        }
        .register-here a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <form action="/loginSubmit" method="post">
                <h2 class="text-center">Login</h2>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                    <div class="register-here"><a href="/register">Register here</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>