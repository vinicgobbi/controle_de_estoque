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


                    <div class="col-md-4">
                        <label for="nome_prod" class="form-label">Nome do Produto <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nome_prod" name="nome_prod" value="{{ old('nome_prod') }}">
                    </div>


                    <div class="col-md-6">
                        <label for="almox_id" class="form-label">Almoxarifado <span style="color: red">*</span></label>
                        <select id="almox_id" name="almox_id" class="form-select">
                            <option value="">Selecione...</option>
                            @foreach ($almoxarifados as $almoxarifado)
                                <option value="{{ $almoxarifado->id }}" {{ old('almox_id') == $almoxarifado->id ? 'selected' : '' }}>
                                    {{ $almoxarifado->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="cod_prod" class="form-label">Codigo do Produto</label>
                        <input
                            type="text"
                            class="form-control"
                            id="cod_prod"
                            name="cod_prod"
                            value="{{ old('cod_prod') }}"
                            maxlength="6"
                            pattern="\d{6}"
                            title="Informe exatamente 6 digitos numericos"
                        >
                    </div>


                    <div class="col-12">
                        <label for="desc_prod" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="desc_prod" name="desc_prod" value="{{ old('desc_prod') }}">
                    </div>

                    <div class="col-md-4">
                        <label for="quant_prod" class="form-label">Quantidade <span style="color: red">*</span></label>
                        <input type="number" class="form-control" id="quant_prod" name="quant_prod" value="{{ old('quant_prod', 0) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="quant_min_prod" class="form-label">Qtd. Mínima</label>
                        <input type="number" class="form-control" id="quant_min_prod" name="quant_min_prod" value="{{ old('quant_min_prod', 0) }}">
                    </div>

                <div class="col-md-2">
                    <label for="categoria_id" class="form-label">Categoria <span style="color: red">*</span></label>
                    <select id="categoria_id" name="categoria_id" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="grupo_id" class="form-label">Grupo <span style="color: red">*</span></label>
                    <select id="grupo_id" name="grupo_id" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>
                                {{ $grupo->nome }}
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
