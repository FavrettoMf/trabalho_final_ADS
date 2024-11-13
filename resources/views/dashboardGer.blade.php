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
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #495057, #343a40);
        }

        .navbar-brand,
        .nav-link {
            color: #f8f9fa;
        }

        .nav-link:hover {
            color: #ced4da;
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
            z-index: -2;
        }

        /* Main Content */
        .content-container {
            position: relative;
            max-width: 1000px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            width: 280px;
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            background-color: #f8f9fa;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
            height: 180px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }

        /* Button */
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 30px;
            font-size: 1rem;
            font-weight: 500;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0px 4px 15px rgba(0, 123, 255, 0.5);
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

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 20px;
            }

            .content-container {
                margin-top: 80px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Gerenciamento Automotivo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.youtube.com/@matheusfavretto6442" target="_blank">
                            <i class="fab fa-youtube"></i> YouTube
                        </a>
                    </li>
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
        <h1 class="title">Gerenciamento Automotivo</h1>
        <div class="card-container">
            <!-- Card 1: Lista de serviços -->
            <div class="card">
                <img src="https://www.jrcastro.com.br/mecanica/imagens/oficina-mecanica-mais-proxima.jpg" class="card-img-top" alt="Lista de serviços">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-wrench"></i> Lista de clientes</h5>
                    <a href="{{ url('/clientes') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
            <!-- Card 2: Serviços oferecidos -->
            <div class="card">
                <img src="https://static.wixstatic.com/media/332f0e_b2b89dcbbb794d47a7a5a794b0ecaef4~mv2.jpg" class="card-img-top" alt="Serviços oferecidos">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-car"></i> Serviços Oferecidos</h5>
                    <a href="{{ url('/tipo_servicos') }}" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Gerenciamento Automotivo. Todos os direitos reservados. | <a href="#" class="text-light">Contato</a> | <a href="#" class="text-light">Política de Privacidade</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
