<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gerenciamento</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <!-- Fontes Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .background-image {
            background-image: url('https://images.unsplash.com/photo-1542744173-38713389f7f6');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center background-image">
        <div class="overlay absolute inset-0"></div>
        <div class="relative z-10 max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="data:image/jpeg;base64,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" alt="Logo" class="w-24 h-24 object-cover rounded-full shadow-lg">
            </div>

            <!-- Título -->
            <h1 class="text-center text-3xl font-bold text-gray-800 mb-6">Bem-vindo ao seu gerenciamento!</h1>

            <!-- Mensagem de status da sessão -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Formulário de login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6" id="loginForm">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="relative">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="block mt-1 w-full pr-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500" onclick="togglePasswordVisibility()">
                        <svg id="eyeIcon" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="eyeOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path id="eyeClosed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div id="passwordError" class="text-red-500 mt-2"></div>
                </div>

                <!-- Lembrar de mim e Esqueci minha senha -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
                        
                    </label>
                    
                </div>

                <!-- Botão de Login -->
                <div>
                    <x-primary-button class="w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500">
                        <span class="flex items-center justify-center text-white font-semibold">
                            {{ __('Entrar') }}
                        </span>
                    </x-primary-button>
                </div>
                <div class="mt-4 text-center">
                    <a href="dashboardGer" class="text-sm text-blue-500 hover:underline">Esqueceu sua senha?</a>
                </div>

                <!-- Link para registro -->
                <p class="text-center text-sm text-gray-600 mt-4">
                    {{ __('Não tem uma conta?') }}
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">{{ __('Cadastre-se') }}</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                passwordField.type = 'password';
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const passwordField = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');

            // Limpe qualquer mensagem de erro anterior
            passwordError.textContent = '';

            // Verifique se a senha atende aos critérios desejados (exemplo: ao menos 6 caracteres)
            if (passwordField.value.length < 6) {
                event.preventDefault();
                passwordError.textContent = 'A senha deve ter pelo menos 6 caracteres.';
            }
        });
    </script>
</body>
</html>




