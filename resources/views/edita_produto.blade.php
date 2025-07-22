<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="{{ asset('faesa_favicon.png') }}" />
    <title>Editar Produto</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>
    @include('components.navbar')

    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="card-title mb-4">
                    <i class="bi bi-pencil-square me-2"></i>Editar Produto
                </h3>

                {{-- Exibir erros de validação --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/produtos/' . $produto->ID) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="COD_PROD" class="form-label">Código do Produto *</label>
                        <input
                            type="text"
                            class="form-control"
                            id="COD_PROD"
                            name="COD_PROD"
                            value="{{ old('COD_PROD', $produto->COD_PROD) }}"
                            required
                            maxlength="50"
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="ALMOX_PROD" class="form-label">Almoxarifado</label>
                        <input
                            type="text"
                            class="form-control"
                            id="ALMOX_PROD"
                            name="ALMOX_PROD"
                            value="{{ old('ALMOX_PROD', $produto->ALMOX_PROD) }}"
                            maxlength="50"
                        >
                    </div>

                    <div class="col-12">
                        <label for="DESC_PROD" class="form-label">Descrição</label>
                        <input
                            type="text"
                            class="form-control"
                            id="DESC_PROD"
                            name="DESC_PROD"
                            value="{{ old('DESC_PROD', $produto->DESC_PROD) }}"
                            maxlength="255"
                        >
                    </div>

                    <div class="col-md-4">
                        <label for="QUANT_PROD" class="form-label">Quantidade</label>
                        <input
                            type="number"
                            class="form-control"
                            id="QUANT_PROD"
                            name="QUANT_PROD"
                            value="{{ old('QUANT_PROD', $produto->QUANT_PROD) }}"
                            min="0"
                        >
                    </div>

                    <div class="col-md-4">
                        <label for="QUANT_MIN_PROD" class="form-label">Qtd. Mínima</label>
                        <input
                            type="number"
                            class="form-control"
                            id="QUANT_MIN_PROD"
                            name="QUANT_MIN_PROD"
                            value="{{ old('QUANT_MIN_PROD', $produto->QUANT_MIN_PROD) }}"
                            min="0"
                        >
                    </div>

                    <div class="col-md-2">
                        <label for="CATEGORIA_ID" class="form-label">Categoria <span class="text-danger">*</span></label>
                        <select id="CATEGORIA_ID" name="CATEGORIA_ID" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->ID }}" 
                                    {{ old('CATEGORIA_ID', $produto->CATEGORIA_ID) == $categoria->ID ? 'selected' : '' }}>
                                    {{ $categoria->NOME }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="GRUPO_ID" class="form-label">Grupo <span class="text-danger">*</span></label>
                        <select id="GRUPO_ID" name="GRUPO_ID" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->ID }}" 
                                    {{ old('GRUPO_ID', $produto->GRUPO_ID) == $grupo->ID ? 'selected' : '' }}>
                                    {{ $grupo->NOME }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Atualizar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
