<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
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
            background: rgba(255, 255, 255, 0.95);
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

        .strength-meter {
            height: 5px;
            background: #eee;
            border-radius: 5px;
            margin-top: 10px;
            overflow: hidden;
            position: relative;
        }

        .strength-meter::before {
            content: '';
            position: absolute;
            left: 0;
            height: 100%;
            width: 0;
            background: #e74c3c;
            transition: width 0.3s ease, background 0.3s ease;
        }

        .strength-weak::before {
            width: 30%;
            background: #e74c3c;
        }

        .strength-medium::before {
            width: 60%;
            background: #f39c12;
        }

        .strength-strong::before {
            width: 100%;
            background: #2ecc71;
        }

        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            text-align: right;
        }

        .btn-register {
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

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #777;
        }

        .login-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        .terms {
            display: flex;
            align-items: center;
            margin-top: 20px;
            color: #777;
            font-size: 0.9rem;
        }

        .terms input {
            margin-right: 10px;
        }

        .terms a {
            color: #2575fc;
            text-decoration: none;
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
    <div class="container">
        <div class="left-panel">
            <h2>Create Your Account</h2>
            <p>Join our community and enjoy exclusive benefits tailored just for you.</p>
            
            <ul class="features">
                <li><i class="fas fa-check"></i> Access to premium features</li>
                <li><i class="fas fa-check"></i> Personalized recommendations</li>
                <li><i class="fas fa-check"></i> Priority customer support</li>
                <li><i class="fas fa-check"></i> Exclusive member discounts</li>
            </ul>
            
            <div class="animation">
                <i class="fas fa-user-circle fa-5x" style="margin-top: 30px;"></i>
            </div>
        </div>
        
        <div class="right-panel">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill in the details to create your account</p>
            </div>
            
            <form method="POST" action="{{route('userreg')}}" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Enter your full name">
                    </div>
                    <span class="error" id="nameError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <span class="error" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Create a password">
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="strength-meter" id="strengthMeter"></div>
                    <div class="strength-text" id="strengthText"></div>
                    <span class="error" id="passwordError"></span>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password">
                        <span class="password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <span class="error" id="confirmPasswordError"></span>
                </div>
                
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>

                <button type="submit" class="btn-register">Create Account</button>
            </form>
            
            <div class="login-link">
                Already have an account? <a href="{{route('userlog')}}">Sign In</a>
            </div>
        </div>
    </div>
    
    <script>
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
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
        
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPassword = document.getElementById('confirmPassword');
            const icon = this.querySelector('i');
            
            if (confirmPassword.type === 'password') {
                confirmPassword.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPassword.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Password strength meter
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = document.getElementById('strengthMeter');
            const strengthText = document.getElementById('strengthText');
            
            // Reset classes
            strengthMeter.className = 'strength-meter';
            
            if (password.length === 0) {
                strengthText.textContent = '';
                return;
            }
            
            let strength = 0;
            
            // Check password length
            if (password.length > 7) strength += 1;
            
            // Check for lowercase letters
            if (/[a-z]/.test(password)) strength += 1;
            
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) strength += 1;
            
            // Check for numbers
            if (/[0-9]/.test(password)) strength += 1;
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            // Update strength meter
            if (strength < 2) {
                strengthMeter.classList.add('strength-weak');
                strengthText.textContent = 'Weak password';
                strengthText.style.color = '#e74c3c';
            } else if (strength < 4) {
                strengthMeter.classList.add('strength-medium');
                strengthText.textContent = 'Medium password';
                strengthText.style.color = '#f39c12';
            } else {
                strengthMeter.classList.add('strength-strong');
                strengthText.textContent = 'Strong password';
                strengthText.style.color = '#2ecc71';
            }
        });
        
        // Form validation
        function validateForm() {
            let isValid = true;
            
            // Reset errors
            document.querySelectorAll('.error').forEach(el => el.textContent = '');
            
            // Name validation
            const name = document.getElementById('name').value.trim();
            if (!name) {
                document.getElementById('nameError').textContent = 'Name is required';
                isValid = false;
            } else if (name.length < 3) {
                document.getElementById('nameError').textContent = 'Name must be at least 3 characters';
                isValid = false;
            }
            
            // Email validation
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                document.getElementById('emailError').textContent = 'Email is required';
                isValid = false;
            } else if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email';
                isValid = false;
            }
            
            // Password validation
            const password = document.getElementById('password').value;
            if (!password) {
                document.getElementById('passwordError').textContent = 'Password is required';
                isValid = false;
            } else if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters';
                isValid = false;
            }
            
            // Confirm password validation
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (!confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Please confirm your password';
                isValid = false;
            } else if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
                isValid = false;
            }
            
            // Terms agreement
            const terms = document.getElementById('terms').checked;
            if (!terms) {
                alert('Please agree to the Terms of Service and Privacy Policy');
                isValid = false;
            }
            
            return isValid;
        }
    </script>
</body>
</html>