<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Criar Categoria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('faesa_favicon.png') }}" />
    
    <!-- Importa a fonte Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap e Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        #alert-error {
            animation: slideDownFadeOut 3s ease forwards;
        }
        body {
            font-family: "Montserrat", sans-serif;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        #content-wrapper {
            width: 85vw;
            height: 97vh;
            margin: auto;
            display: column;
            gap: 24px;
            overflow-y: auto;
            align-items: stretch;
        }
        @keyframes slideDownFadeOut {
            0% {
                transform: translate(-50%, -100%);
                opacity: 0;
            }
            10% {
                transform: translate(-50%, 0);
                opacity: 1;
            }
            85% {
                transform: translate(-50%, 0);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -100%);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    @include('components.navbar')

    <div id="content-wrapper">
        <div class="bg-white p-4 rounded shadow-sm w-100">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <i class="bi bi-plus-circle me-2"></i>Criar Nova Categoria
                    </h3>

                    @if ($errors->any())
                        <div id="alert-error" class="alert alert-danger shadow position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050; max-width: 90%;">
                            <strong>Ops!</strong> Corrija os itens abaixo:
                            <ul class="mb-0 mt-1 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('create-categoria') }}" method="POST" class="row g-3">
                        @csrf


                        <div class="col-md-4">
                            <label for="nome" class="form-label">Nome da Categoria <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i>Salvar Categoria
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>