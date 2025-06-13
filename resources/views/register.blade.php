<!DOCTYPE html>
<html>
<head>
    <title>LEMS | Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f0f2f5;
        }
        .register-container {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            position: relative;
        }
        /* Loader overlay */
        #loader {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(255,255,255,0.8);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-light">
    <h1 class="text-center fw-bold m-0">📧</h1>
    <div class="text-center mt-1 mb-3">
        <h2 class="fw-bold">Email Sender</h2>
        <p class="text-muted">Fill out the form to register and receive a welcome email</p>
    </div>

      <!-- Loader Overlay -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
        <span class="visually-hidden">Saving...</span>
        </div>
    </div>

    <!-- Registration Card -->
    <div class="container">
        <div class="card mx-auto shadow-sm" style="max-width: 420px; border-radius: 12px;">
            <div class="card-body p-4 position-relative">
                <!-- X button to go back -->
                <a href="{{ route('users.index') }}" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close"></a>
                <h4 class="text-center mb-4 text-primary">Register</h4>
                <form id="registerForm" method="POST" action="{{ route('register.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control" placeholder="Enter your fullname"
                               value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email"
                               class="form-control" placeholder="example@gmail.com"
                               value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control" placeholder="Minimum 6 characters"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               id="password_confirmation" class="form-control"
                               placeholder="Retype password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- {{-- SweetAlert2 Notifications --}} -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registered Successfully!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                timer: 3000
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    <!-- Show on submit / hide on load script -->
  <script>
    const loader = document.getElementById('loader');
    const form   = document.getElementById('registerForm');

    form.addEventListener('submit', () => {
      loader.style.display = 'flex';
    });

    window.addEventListener('load', () => {
      loader.style.display = 'none';
    });
  </script>
</body>
</html>
<!-- {{-- This is the registration form view for the Laravel application. It includes a form for users to register with their name, email, and password. Upon successful registration, a success message is displayed using SweetAlert2. The form also includes error handling for validation errors. --}}

{{-- Note: Ensure that you have the necessary routes and controllers set up in your Laravel application to handle the registration process. --}}
{{-- The form action should point to the route that processes the registration. --}}

{{-- This code is a complete HTML document with embedded PHP for a registration form in a Laravel application. It includes Bootstrap for styling and SweetAlert2 for notifications. --}}
{{-- The form captures user input for name, email, and password, and displays success or error messages based on the registration outcome. --}}

{{-- The loader overlay is displayed when the form is submitted to indicate that processing is taking place. --}}

{{-- Make sure to include the necessary scripts and styles in your Laravel project for this code to work correctly. --}}
{{-- The form uses CSRF protection provided by Laravel and includes validation error handling. --}}

{{-- This code is designed to be user-friendly and visually appealing, with a clean layout and responsive design. --}}
{{-- The use of icons and colors enhances the user experience, making it easy to understand and navigate. --}}

{{-- The registration form is a crucial part of the application, allowing users to create accounts and access features. --}}
{{-- Ensure that you have the necessary backend logic to handle user registration securely and efficiently. --}}
{{-- This includes hashing passwords, validating input, and sending confirmation emails if required. --}}

{{-- The form is designed to be easily customizable, allowing you to modify styles, texts, and functionalities as needed. --}}
{{-- You can also extend the form with additional fields or features based on your application's requirements. --}}
{{-- The use of Bootstrap ensures that the form is responsive and looks good on various devices, including desktops, tablets, and smartphones. --}}
{{-- This is important for providing a seamless user experience across different platforms. --}}

{{-- Overall, this code serves as a solid foundation for a registration form in a Laravel application, with best practices in mind. --}} -->