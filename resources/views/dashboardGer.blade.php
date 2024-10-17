<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .content-container {
            position: relative;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card {
            margin: 15px auto;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .nav-link {
            color: #fff;
            font-size: 1rem;
        }

        .nav-link:hover {
            color: #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #e9ecef;
            margin-top: 30px;
        }

        .certificacao {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            margin-top: 30px;
        }

        .certificacao h2,
        .certificacao p {
            text-align: center;
        }
    </style>
    
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top border-bottom border-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gerenciamento Automotivo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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

    <div class="content-container">
        <h1 class="text-center mb-4">GERENCIAMENTO AUTOMOTIVO</h1>
        <div class="row justify-content-center">
            <!-- Card 1: Veículos -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDKBtVvctXpMQwC01dwlZcsU0QCb1g7dyd5A&s" class="card-img-top" alt="Imagem do cartão">
                    <div class="card-body">
                        <h5 class="card-title">Lista de veiculos</h5>
                        <a href="{{ url('/veiculos') }}" class="btn btn-primary">ACESSAR</a>
                    </div>
                </div>
            </div>
            <!-- Card 2: Serviços -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOQVr885BGjm9YYHlEilsoS2Zp7kHrtykLvg&s" class="card-img-top" alt="Imagem do cartão">
                    <div class="card-body">
                        <h5 class="card-title">Lista de serviços oferecidos</h5>
                        <a href="{{ url('/tipo_servicos') }}" class="btn btn-primary">ACESSAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certificação -->
    <section class="certificacao fixed-bottom">
        <div class="container">
            <p class="mb-0">&copy; 2024 Gerenciamento Automotivo. Todos os direitos reservados.</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+NfW7N0C5N5G1c5F5F5s0G5K0L5N5F5" crossorigin="anonymous"></script>
</body>

</html>
