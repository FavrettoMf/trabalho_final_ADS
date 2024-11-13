<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #eef2f7;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #495057, #343a40);
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #f8f9fa;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .nav-link {
            color: #f8f9fa;
        }

        .nav-link:hover {
            color: #ced4da;
            background-color: transparent;
        }

        /* Background Image */
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(35%);
            z-index: -1;
        }

        /* Main Content */
        .content-container {
            position: relative;
            max-width: 900px;
            margin: 150px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        .content-container h1 {
            color: #343a40;
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 35px;
            font-size: 1.1rem;
            font-weight: 500;
            transition: background-color 0.3s, box-shadow 0.3s;
            border-radius: 30px;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.5);
        }

        /* Sidebar Button */
        .sidebar-btn {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.3s;
            font-size: 1.2rem;
        }

        .sidebar-btn:hover {
            color: #0056b3;
        }

        /* Hidden Menu */
        .hidden-menu {
            display: none;
            margin-top: 20px;
            transition: max-height 0.4s ease;
            overflow: hidden;
        }

        .hidden-menu a {
            display: block;
            padding: 12px 0;
            color: #007bff;
            font-size: 1.1rem;
            text-decoration: none;
            transition: color 0.3s;
            padding-left: 20px;
            border-left: 5px solid transparent;
        }

        .hidden-menu a:hover {
            color: #0056b3;
            border-color: #007bff;
        }

        /* Clock */
        .clock {
            font-size: 2.5rem;
            color: #495057;
            font-weight: bold;
            margin-top: 30px;
            font-family: 'Courier New', Courier, monospace;
        }

        /* Footer */
        .footer {
            background-color: #495057;
            color: #f8f9fa;
            padding: 15px;
            text-align: center;
            font-size: 0.9rem;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        /* Panel */
        .panel {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .panel h2 {
            font-size: 1.8rem;
            color: #343a40;
            margin-bottom: 20px;
        }

        .panel .panel-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #495057;
        }

        .panel .panel-item span {
            font-weight: bold;
        }

        /* Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Gerenciamento Automotivo</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-3" href="{{ url('/') }}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </nav>

    <img src="https://blog.simplusbr.com/wp-content/uploads/2020/09/oficina-mecanica-organizada.jpg" alt="Imagem de Fundo" class="background-image">

    <!-- Conteúdo Principal -->
    <div class="content-container">
        <h1>GERENCIAMENTO AUTOMOTIVO</h1>
        <a href="{{ url('/servicos') }}" class="btn btn-primary"> Serviços</a>

        <!-- Clock -->
        <div class="clock" id="clock">00:00:00</div>

        <!-- Informações de Painel -->
       

        

        <!-- Botão para Exibir Mais Opções -->
        <div class="sidebar-btn" onclick="toggleMenu()">
            <i class="fas fa-bars"></i> Mais Opções
        </div>

        <!-- Menu Oculto -->
        <div class="hidden-menu" id="hiddenMenu">
            <a href="{{ url('/clientes') }}"><i class="fas fa-users"></i> Clientes</a>
            <a href="{{ url('/veiculos') }}"><i class="fas fa-car"></i> Veículos</a>
            <a href="{{ url('/tipo_servicos') }}"><i class="fas fa-wrench"></i> Serviços oferecidos</a>
        </div>
    </div>

    

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Gerenciamento Automotivo. Todos os direitos reservados.</p>
    </footer>

    <script>
        // Relógio ao vivo
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);

        // Função de alternância do menu
        function toggleMenu() {
            const menu = document.getElementById('hiddenMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>

</html>
