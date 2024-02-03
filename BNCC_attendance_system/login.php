<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .form-login {
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-login .checkbox {
            font-weight: 400;
        }
        .form-login .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-login .form-control:focus {
            z-index: 2;
        }
        .form-login input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-login input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-login" action="login_process.php" method="post">
            <h2 class="form-login-heading">Login</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

            <div class="checkbox mt-4">
                <label>
                    <input type="checkbox" id="showPassword"> Show Password
                </label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelector(".form-login").addEventListener("submit", function(event) {
            var email = document.getElementById("inputEmail").value;
            var password = document.getElementById("inputPassword").value;
    
            if(email === "" || password === "") {
                alert("Both email and password are required!");
                event.preventDefault(); // Menghentikan form dari submit
            }
            // Anda bisa menambahkan validasi lainnya di sini
        });

        document.getElementById('showPassword').addEventListener('click', function (e) {
            var passwordInput = document.getElementById('inputPassword');
            if (e.target.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    
</body>
</html>
