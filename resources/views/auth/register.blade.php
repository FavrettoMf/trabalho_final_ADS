<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/css/styles.css"> 
    <style>
        body {
            background-color: #808080; /* Cor de fundo fora do container */
            margin: 0;
            height: 100vh;
            overflow: hidden;
        }

        .background-image {
            background-image: url('https://images.unsplash.com/photo-1542744173-38713389f7f6');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Ocupa 100% da altura da tela */
            width: 100%;   /* Ocupa 100% da largura da tela */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff; /* Cor de fundo do container */
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            max-width: 24rem;
            width: 100%;
            border: 1px solid #e5e7eb;
            animation: fadeIn 0.5s; /* Animação ao aparecer */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-error {
            color: #dc2626; /* Vermelho para mensagens de erro */
        }

        .hover-effect:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="background-image">
        <div class="container">
            <h1 class="text-center text-3xl font-bold mb-6 text-indigo-600">Crie sua conta!</h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 input-error" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 input-error" />
                </div>

                <div class="relative">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 input-error" />
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 text-gray-600" onclick="togglePasswordVisibility()">
                        <svg class="h-6 text-gray-700" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!show" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path x-show="show" d="M2.94 5.34A10 10 0 0 1 21.06 18.66L18.5 16.1a6.982 6.982 0 0 0 .5-3.1c0-3.87-3.13-7-7-7a6.98 6.98 0 0 0-3.1.5L2.94 5.34z"/>
                        </svg>
                    </button>
                    <div id="passwordError" class="text-red-500 mt-2"></div>
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 input-error" />
                </div>

                <div class="mt-4">
                    <a href="{{ url('/') }}" class="hover-effect w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM9 6a1 1 0 0 1 2 0v4a1 1 0 1 1-2 0V6zm1 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                        Voltar à tela de login
                    </a>
                </div>

                <div>
                    <x-primary-button class="w-full bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 transition duration-150">
                        <span class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM9 6a1 1 0 0 1 2 0v4a1 1 0 1 1-2 0V6zm1 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                            {{ __('Registrar') }}
                        </span>
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }

        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const passwordField = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');

            // Limpa qualquer mensagem de erro anterior
            passwordError.textContent = '';

            // Verifica se a senha atende aos critérios desejados (exemplo: ao menos 8 caracteres)
            if (passwordField.value.length < 8) {
                event.preventDefault();
                passwordError.textContent = 'A senha deve ter pelo menos 8 caracteres.';
            }

            if (passwordField.value.length < 8) {
                event.preventDefault();
                passwordError.textContent = 'A senha deve ter pelo menos 8 caracteres.';
            }
        });
    </script>
</body>
</html>
