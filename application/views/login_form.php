<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <div
        class="bg-gray-800 text-white p-8 sm:p-10 md:p-12 rounded-xl shadow-2xl w-full max-w-xs sm:max-w-sm md:max-w-md">
        <div class="flex flex-col items-center mb-8">
            <svg class="h-12 w-12 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3h8z" />
            </svg>
            <h2 class="text-3xl font-bold text-center">Masuk ke Dashboard</h2>
            <p class="text-gray-400 mt-2 text-center">Silakan Masukkan Username dan Password Anda.</p>
        </div>

        <?php if (isset($error_message)): ?>
        <div class="bg-red-500 text-white text-sm p-3 rounded-lg mb-4">
            <?php echo $error_message; ?>
        </div>
        <?php endif; ?>

        <?php if (validation_errors()): ?>
        <div class="bg-red-500 text-white text-sm p-3 rounded-lg mb-4">
            <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>

        <form action="<?php echo site_url('auth/login_process'); ?>" method="post">
            <div class="mb-5">
                <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>"
                    class="bg-gray-700 text-white border border-gray-600 rounded-lg w-full py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="contoh@email.com">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="bg-gray-700 text-white border border-gray-600 rounded-lg w-full py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10"
                        placeholder="••••••••">
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 focus:outline-none">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg w-full transition duration-300">
                Masuk
            </button>
        </form>
    </div>


    <script>
    $(document).ready(function() {
        $('#togglePassword').click(function() {
            var passwordInput = $('#password');
            var eyeIcon = $('#eyeIcon');

            // Mengubah tipe input antara 'password' dan 'text'
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
    </script>

</body>

</html>