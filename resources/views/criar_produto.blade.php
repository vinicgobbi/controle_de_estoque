<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Criar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('faesa_favicon.png') }}" />

    <!-- Bootstrap e Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    #alert-error {
        animation: slideDownFadeOut 3s ease forwards;
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

    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="card-title mb-4">
                    <i class="bi bi-plus-circle me-2"></i>Criar Novo Produto
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

                <form action="{{ route('create-produto') }}" method="POST" class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label for="COD_PROD" class="form-label">Código do Produto <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="COD_PROD" name="COD_PROD" value="{{ old('COD_PROD') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="ALMOX_PROD" class="form-label">Almoxarifado <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="ALMOX_PROD" name="ALMOX_PROD" value="{{ old('ALMOX_PROD') }}">
                    </div>

                    <div class="col-12">
                        <label for="DESC_PROD" class="form-label">Descrição <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="DESC_PROD" name="DESC_PROD" value="{{ old('DESC_PROD') }}">
                    </div>

                    <div class="col-md-4">
                        <label for="QUANT_PROD" class="form-label">Quantidade <span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="QUANT_PROD" name="QUANT_PROD" value="{{ old('QUANT_PROD', 0) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="QUANT_MIN_PROD" class="form-label">Qtd. Mínima</label>
                        <input type="number" class="form-control" id="QUANT_MIN_PROD" name="QUANT_MIN_PROD" value="{{ old('QUANT_MIN_PROD', 0) }}">
                    </div>

                <div class="col-md-2">
                    <label for="CATEGORIA_ID" class="form-label">Categoria <span style="color: red">*</span></label>
                    <select id="CATEGORIA_ID" name="CATEGORIA_ID" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach ($categorias as $categoria)
                            <option>
                                {{ $categoria->NOME }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="GRUPO_ID" class="form-label">Grupo <span style="color: red">*</span></label>
                    <select id="GRUPO_ID" name="GRUPO_ID" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach ($grupos as $grupo)
                            <option>
                                {{ $grupo->NOME }}
                            </option>
                        @endforeach
                    </select>
                </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>Salvar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
