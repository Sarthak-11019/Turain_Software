<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(to bottom right, #2575fc, #6a11cb);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -100px;
            left: -100px;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            bottom: -80px;
            right: -80px;
        }

        .left-panel h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .left-panel p {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 80%;
            position: relative;
            z-index: 1;
            margin-bottom: 30px;
        }

        .features {
            text-align: left;
            width: 80%;
            position: relative;
            z-index: 1;
        }

        .features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .features i {
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .right-panel {
            flex: 1;
            background: white;
            padding: 50px 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #777;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .form-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
            outline: none;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
            height: 20px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #2575fc;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #777;
        }

        .register-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        .social-login {
            margin-top: 30px;
            text-align: center;
        }

        .social-login p {
            color: #777;
            margin-bottom: 15px;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            height: 1px;
            width: 30%;
            background: #e0e0e0;
            top: 50%;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
        }

        .facebook {
            background: #3b5998;
        }

        .google {
            background: #db4437;
        }

        .twitter {
            background: #1da1f2;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel {
                padding: 30px 20px;
            }
            
            .left-panel h2 {
                font-size: 2rem;
            }
            
            .right-panel {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    @if(session('Message'))
               <script> alert('{{ session('Message') }}') </script>
        @endif 
    <div class="container">
        <div class="left-panel">
            <h2>Welcome Back!</h2>
            <p>We're so excited to see you again! Log in to access your personalized dashboard.</p>
            
            <ul class="features">
                <li><i class="fas fa-check"></i> Track your progress and history</li>
                <li><i class="fas fa-check"></i> Access your saved content</li>
                <li><i class="fas fa-check"></i> Continue where you left off</li>
                <li><i class="fas fa-check"></i> Get personalized recommendations</li>
            </ul>
            
            <div class="animation">
                <i class="fas fa-sign-in-alt fa-5x" style="margin-top: 30px;"></i>
            </div>
        </div>
        
        <div class="right-panel">
            <div class="form-header">
                <h2>Login to Your Account</h2>
                <p>Enter your credentials to continue</p>
            </div>
            
            <form method="POST" action="{{route('logincheck')}}" onsubmit="return validateLoginForm()">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="loginEmail" placeholder="Enter your email">
                    </div>
                    <span class="error" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="loginPassword" placeholder="Enter your password">
                        <span class="password-toggle" id="toggleLoginPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <span class="error" id="passwordError"></span>
                </div>
                
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>
            
            <div class="social-login">
                <p>Or login with</p>
                <div class="social-icons">
                    <div class="social-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-icon google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>
            
            <div class="register-link">
                Don't have an account? <a href="{{route('userreg')}}">Sign Up</a>
            </div>
        </div>
    </div>
    
    <script>
        // Password visibility toggle
        document.getElementById('toggleLoginPassword').addEventListener('click', function() {
            const password = document.getElementById('loginPassword');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Form validation
        function validateLoginForm() {
            let isValid = true;
            
            // Reset errors
            document.querySelectorAll('.error').forEach(el => el.textContent = '');
            
            // Email validation
            const email = document.getElementById('loginEmail').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                document.getElementById('emailError').textContent = 'Email is required';
                isValid = false;
            } else if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email';
                isValid = false;
            }
            
            // Password validation
            const password = document.getElementById('loginPassword').value;
            if (!password) {
                document.getElementById('passwordError').textContent = 'Password is required';
                isValid = false;
            }
            
            return isValid;
        }
    </script>
</body>
</html>