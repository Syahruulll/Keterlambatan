<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            width: 80%; /* Sesuaikan lebar sesuai kebutuhan */
            max-width: 400px; /* Sesuaikan lebar maksimum sesuai kebutuhan */
            overflow: hidden;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signin-signup {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .sign-in-form {
            width: 100%; /* Sesuaikan lebar sesuai kebutuhan */
            padding: 75px;
            box-sizing: border-box;
            transition: transform 0.5s;
        }

        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .input-field {
            position: relative;
            margin-bottom: 25px;

            
        }

        .input-field i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            /* left: 2px; */
            right: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        .alert {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-primary {
            background-color: #cce5ff;
            color: #004085;
            border: 1px solid #b8daff;
        }

        #submit-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #submit-btn:hover {
            background-color: #45a049;
        }
    </style>

    <title>Sign In</title>
</head>

<body>
    <div class="container">
        <div class="signin-signup">
            <form action="{{ route('login.auth') }}" class="sign-in-form" method="POST">
                @csrf
                @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                @if (Session::get('logout'))
                <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                @endif
                @if (Session::get('canAccess'))
                <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                @endif
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" id="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" id="submit-btn">Sign In</button>

            </form>
        </div>
    </div>
</body>

</html>
