<?php 
include('../HERESFINAL/connect.php');
include('../HERESFINALcommon_function.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HERE'S WEBSITE - User Log In and Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url('cover.jpg') no-repeat;
        background-size: cover;
        background-position: center;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
    }

    .logo {
        font-size: 2em;
        color: black;
        user-select: none;
    }

    .navigation a {
        position: relative;
        font-size: 1.1em;
        color: black;
        text-decoration: none;
        font-weight: 500;
        margin-left: 40px;

    }

    .navigation a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 3px;
        background: #fff;
        border-radius: 5px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .5s;
    }

    .navigation a:hover::after {
        transform-origin: left;
        transform: scaleX(1);
    }

    .navigation .btnLogin-popup {
        width: 130px;
        height: 50px;
        background: transparent;
        border: 2px solid #fff;
        outline: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1.1em;
        color: black;
        font-weight: 500;
        margin-left: 40px;
        transition: .5s;
    }

    .navigation .btnLogin-popup:hover {
        background: #fff;
        color: #162938;
    }

    .wrapper {
        position: relative;
        width: 400px;
        height: 520px;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, .5);
        border-radius: 20px;
        backdrop-filter: blur(20px);
        box-shadow: 0 0 30px rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transform: scale(0);
        transition: transform .5s ease, height .2s ease;
    }

    .wrapper.active-popup {
        transform: scale(1);
    }

    .wrapper.active {
        height: 900px;
    }

    .wrapper .form-box {
        width: 100%;
        padding: 40px;
    }

    .wrapper .form-box.login {
        transition: transform .18s ease;
        transform: translateX(0);
    }

    .wrapper.active .form-box.login {
        transition: none;
        transform: translateX(-400px);
    }

    .wrapper .form-box.register {
        position: absolute;
        transition: none;
        transform: translateX(400px);
    }

    .wrapper.active .form-box.register {
        transition: transform .18s ease;
        transform: translateX(0);
    }

    .form-container {
        margin-top: 40px;
    }

    .form-box.register {
        width: 100%;
    }

    .form-box.register h2 {
        margin-top: 0;
    }

    .wrapper .icon-close {
        position: absolute;
        top: 0;
        right: 0;
        width: 45px;
        height: 45px;
        background: #162938;
        font-size: 2em;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom-left-radius: 20px;
        cursor: pointer;
        z-index: 1;
    }

    .form-box h2 {
        font-size: 2em;
        color: #162938;
        text-align: center;

    }

    .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        border-bottom: 2px solid #162938;
        margin: 30px 0;
    }

    .input-box label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        font-size: 1em;
        color: #162938;
        font-weight: 500;
        pointer-events: none;
        transition: .5s;
    }

    .input-box input:focus~label,
    .input-box input:valid~label {
        top: -5px;
    }

    .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #162938;
        font-weight: 600;
        padding: 0 35px 0 5px;

    }

    .input-box .icon {
        position: absolute;
        right: 8px;
        font-size: 1.2em;
        color: #162938;
        line-height: 57px;
    }

    .remember-forgot {
        font-size: .9em;
        color: #162938;
        font-weight: 500;
        margin: -15px 0 15px;
        display: flex;
        justify-content: space-between;
    }

    .remember-forgot label input {
        accent-color: #162938;
        margin-right: 3px;
    }

    .remember-forgot a {
        color: #162938;
        text-decoration: none;
    }

    .remember-forgot a:hover {
        text-decoration: underline;
    }

    .btn {
        width: 100%;
        height: 45px;
        background: #162938;
        border: none;
        outline: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
    }

    .login-register {
        font-size: .9em;
        color: #162938;
        text-align: center;
        font-weight: 500;
        margin: 25px 0 10px;
    }

    .login-register p a {
        color: #162938;
        text-decoration: none;
        font-weight: 600;
    }

    .login-register p a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <header>
        <h2 class="logo">HERE'S</h2>
        <nav class="navigation">
            <a href="about.php">About</a>
            <a href="#"><button class="btnLogin-popup">Login</button></a>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close"><i class='bx bx-x'></i></span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="process_login.php" method="POST">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" name="username" placeholder="Enter your username" required
                        autocomplete="password">
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-lock-alt'></i></span>
                    <input type="password" name="password" placeholder="Enter your password" required
                        autocomplete="password">
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" name="user_login" class="btn">Login</button>

                <div class="login-register">
                    <p>Don't have an account yet? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="process_registration.php" method="POST" enctype="multipart/form-data">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" name="username" placeholder="Enter your username" required
                        autocomplete="password">
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your fullname" required
                        autocomplete="new-password">
                    <label>Fullname</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <select name="gender" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bxs-contact'></i></span>
                    <input type="text" name="contact_no" placeholder="Enter your contact number" required
                        autocomplete="password">
                    <label>Contact Number</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-home'></i></span>
                    <input type="text" name="address" placeholder="Enter your full address" required
                        autocomplete="new-password">
                    <label>Address</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-envelope'></i></span>
                    <input type="email" name="email" placeholder="Enter your email" required autocomplete="password">
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-lock-alt'></i></span>
                    <input type="password" name="password" placeholder="Enter your password" required
                        autocomplete="password">
                    <label>Password</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bx-image'></i></span>
                    <input type="file" name="user_image" accept="image/*" required autocomplete="false">
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox" name="terms" required> I agree to the terms and conditions.</label>
                </div>

                <button type="submit" class="btn" name="register">Register</button>

                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const wrapper = document.querySelector('.wrapper');
        const loginLink = document.querySelector('.login-link');
        const registerLink = document.querySelector('.register-link');
        const btnPopup = document.querySelector('.btnLogin-popup');

        const iconClose = document.querySelector('.icon-close');

        // Event listener for clicking the register link
        registerLink.addEventListener('click', () => {
            wrapper.classList.add('active');
        });

        loginLink.addEventListener('click', () => {
            wrapper.classList.remove('active');
        });

        // Event listener for clicking the popup button
        btnPopup.addEventListener('click', () => {
            wrapper.classList.add('active-popup');
        });

        // Event listener for clicking the close icon
        iconClose.addEventListener('click', () => {
            wrapper.classList.remove('active-popup');
        });

    });
    </script>
</body>

</html>