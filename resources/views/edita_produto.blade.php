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

                <form action="{{ route('update-produto', $produto->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-4">
                        <label for="nome_prod" class="form-label">Nome do Produto</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome_prod"
                            name="nome_prod"
                            value="{{ old('nome_prod', $produto->nome_prod) }}"
                        >
                    </div>                    

                    <div class="col-md-6">
                        <label for="almox_id" class="form-label">Almoxarifado</label>
                        <select id="almox_id" name="almox_id" class="form-select">
                            <option value="">Selecione...</option>
                            @foreach ($almoxarifados as $almoxarifado)
                                <option value="{{ $almoxarifado->id }}" 
                                    {{ old('almoxarifado_id', $produto->almox_id) == $almoxarifado->id ? 'selected' : '' }}>
                                    {{ $almoxarifado->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>    

                    <div class="col-md-2">
                        <label for="cod_prod" class="form-label">Código do Produto</label>
                        <input
                            type="text"
                            class="form-control"
                            id="cod_prod"
                            name="cod_prod"
                            value="{{ old('cod_prod', $produto->cod_prod) }}"
                            disabled {{-- Torna o campo inativo para edições e não envia para o formulario --}}
                        >
                    </div>

                    <div class="col-12">
                        <label for="desc_prod" class="form-label">Descrição</label>
                        <input
                            type="text"
                            class="form-control"
                            id="desc_prod"
                            name="desc_prod"
                            value="{{ old('desc_prod', $produto->desc_prod) }}"
                        >
                    </div>

                    <div class="col-md-4">
                        <label for="quant_prod" class="form-label">Quantidade</label>
                        <input
                            type="number"
                            class="form-control"
                            id="quant_prod"
                            name="quant_prod"
                            value="{{ old('quant_prod', $produto->quant_prod) }}"
                        >
                    </div>

                    <div class="col-md-4">
                        <label for="quant_min_prod" class="form-label">Qtd. Mínima</label>
                        <input
                            type="number"
                            class="form-control"
                            id="quant_min_prod"
                            name="quant_min_prod"
                            value="{{ old('quant_min_prod', $produto->quant_min_prod) }}"
                        >
                    </div>

                    <div class="col-md-2">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select id="categoria_id" name="categoria_id" class="form-select">
                            <option value="">Selecione...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="grupo_id" class="form-label">Grupo</label>
                        <select id="grupo_id" name="grupo_id" class="form-select">
                            <option value="">Selecione...</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}" 
                                    {{ old('grupo_id', $produto->grupo_id) == $grupo->id ? 'selected' : '' }}>
                                    {{ $grupo->nome }}
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
