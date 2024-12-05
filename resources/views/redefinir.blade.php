<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redefinir Senha</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
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

    .message {
      display: none;
      text-align: center;
      margin-top: 20px;
      font-size: 16px;
      color: green;
    }

    .message.show {
      display: block;
    }

    .form-button {
      background-color: #4C51BF;
      border: none;
      color: white;
      padding: 12px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
      transition: background-color 0.3s;
    }

    .form-button:hover {
      background-color: #434190;
    }

    .back-button {
      display: block;
      width: 100%;
      padding: 12px;
      background-color: #E2E8F0;
      color: #4A5568;
      border-radius: 4px;
      text-align: center;
      margin-top: 16px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .back-button:hover {
      background-color: #CBD5E0;
    }

    .retry-message {
      font-size: 14px;
      text-align: center;
      margin-top: 20px;
      color: #DC2626;
      display: none;
    }

    .retry-message.show {
      display: block;
    }

    .countdown {
      font-weight: bold;
      font-size: 16px;
      color: #DC2626;
    }
  </style>
</head>
<body>
  <div class="background-image">
    <div class="container">
      <h2 class="text-center text-3xl font-bold mb-6 text-indigo-600">Redefinir Senha</h2>
      <form id="resetPasswordForm" class="space-y-6">
      <div>
          <label for="newPassword" class="block text-sm font-medium text-gray-700">Senha atual</label>
          <input type="password" name="newPassword" placeholder="Digite sua nova senha" required
                 class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
          <label for="newPassword" class="block text-sm font-medium text-gray-700">Nova Senha</label>
          <input type="password" id="newPassword" name="newPassword" placeholder="Digite sua nova senha" required
                 class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
          <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua nova senha" required
                 class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <button type="submit" id="submitBtn" class="form-button">Redefinir Senha</button>
      </form>
      <div id="message" class="message">Senha redefinida com sucesso!</div>

      <!-- Mensagem e contador de retry -->
      <div id="retryMessage" class="retry-message">
        
      </div>

      <!-- Botão de voltar para login -->
      <button onclick="window.location.href='/dashboard'" class="back-button">Voltar para tela principar</button>
    </div>
  </div>

  <script>
    const form = document.getElementById('resetPasswordForm');
    const message = document.getElementById('message');
    const retryMessage = document.getElementById('retryMessage');
    const countdown = document.getElementById('countdown');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      // Verifica se as senhas coincidem
      if (newPassword !== confirmPassword) {
        alert('As senhas não coincidem!');
        return;
      }

      // Exibe a mensagem de sucesso
      message.classList.add('show');
      // Desabilita o botão de envio
      submitBtn.disabled = true;

      // Exibe a mensagem de tentativa novamente após 30 segundos
      retryMessage.classList.add('show');

      // Limpa o formulário
      form.reset();

      // Inicia o contador regressivo de 30 segundos
      let timeLeft = 30;
      const interval = setInterval(() => {
        timeLeft--;
        countdown.textContent = timeLeft;
        if (timeLeft <= 0) {
          clearInterval(interval);
          submitBtn.disabled = false;  // Habilita o botão de envio novamente
          retryMessage.classList.remove('show');  // Remove a mensagem de retry
        }
      }, 1000);  // Atualiza a cada 1 segundo
    });
  </script>
</body>
</html>
