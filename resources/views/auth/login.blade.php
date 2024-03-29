<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;500&display=swap');

        :root {
            --primary-color: #41C2CB;
            --secondary-color: #80D6DC;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: #EDEDEE;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Raleway', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            margin: 20px 0 30px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid var(--primary-color);
            background-color: var(--secondary-color);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            text-transform: uppercase;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.05);
        }

        button.signup_btn {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #EDEDEE;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form {
            position: absolute;
            top: 0;
            height: 100%;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
        }

        .overlay {
            background: #41C2CB;
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
        }

        .overlay-right {
            right: 0;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid var(--primary-color);
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .social-container a:hover {
            transform: scale(1.08);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form sign-in-container">

            <form method="POST" action="{{ route('login') }}" class="myForm text-center">
                @csrf
                <h1>Log In</h1>
                <div class="social-container">
                    <a href="https://rpbloggers.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://rpbloggers.com/"><i class="fab fa-google-plus-g"></i></a>
                    <a href="https://rpbloggers.com/"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <div class="form-group">
                    <input class="myInput @error('email') is-invalid @enderror" placeholder="Email" type="text"
                        id="email" name="email" required autocomplete="email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="myInput @error('password') is-invalid @enderror" type="password"
                        placeholder="Password" id="password" name="password" required autocomplete="new-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <a href="https://rpbloggers.com/">Forgot your password?</a>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Register</h1>
                    <p>Register here if you don't have account.</p>
                    <a href="/register30"><button class="signup_btn">Register</button></a>
                    <br>

                    <div class="alert alert-info">
                        <span>
                            Admin login : <br>
                            Email : admin@gmail.com <br>
                            Password : 12345678
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>