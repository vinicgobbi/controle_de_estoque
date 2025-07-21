<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Criar Produto</h1>

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('criar-produto') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="COD_PROD" class="form-label">Código do Produto *</label>
            <input type="text" class="form-control" id="COD_PROD" name="COD_PROD" value="{{ old('COD_PROD') }}" required maxlength="50">
        </div>

        <div class="mb-3">
            <label for="ALMOX_PROD" class="form-label">Almoxarifado</label>
            <input type="text" class="form-control" id="ALMOX_PROD" name="ALMOX_PROD" value="{{ old('ALMOX_PROD') }}" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="DESC_PROD" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="DESC_PROD" name="DESC_PROD" value="{{ old('DESC_PROD') }}" maxlength="255">
        </div>

        <div class="mb-3">
            <label for="QUANT_PROD" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="QUANT_PROD" name="QUANT_PROD" value="{{ old('QUANT_PROD', 0) }}" min="0">
        </div>

        <div class="mb-3">
            <label for="QUANT_MIN_PROD" class="form-label">Quantidade Mínima</label>
            <input type="number" class="form-control" id="QUANT_MIN_PROD" name="QUANT_MIN_PROD" value="{{ old('QUANT_MIN_PROD', 0) }}" min="0">
        </div>

        <div class="mb-3">
            <label for="CATEGORIA_ID" class="form-label">Categoria (ID)</label>
            <input type="number" class="form-control" id="CATEGORIA_ID" name="CATEGORIA_ID" value="{{ old('CATEGORIA_ID') }}">
        </div>

        <div class="mb-3">
            <label for="GRUPO_ID" class="form-label">Grupo (ID)</label>
            <input type="number" class="form-control" id="GRUPO_ID" name="GRUPO_ID" value="{{ old('GRUPO_ID') }}">
        </div>

        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>
</body>
</html>
