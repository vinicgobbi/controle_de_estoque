<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de Movimentação</title>
    <link rel="icon" type="image/png" href="{{ asset('faesa_favicon.png') }}" />
    
    <!-- Importa a fonte Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap e Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <style>
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

    </style>
</head>
<body>
	@include('components.navbar')

	<div id="content-wrapper">
		<div class="bg-white p-4 rounded shadow-sm w-100">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <i class="bi bi-plus-circle me-2"></i>Criar Nova Movimentação
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

                    <form action="{{ route('create-movimentacao') }}" method="POST" class="row g-3">
                        @csrf

						
                        <div class="col-md-5">
                            <label for="produto_id" class="form-label">Produto <span style="color: red">*</span></label>
                            <select id="produto_id" name="produto_id" class="form-select">
								
                                <option value="">Selecione...</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                                        {{ $produto->nome_prod }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="tipo" class="form-label">Tipo <span style="color: red">*</span></label>
                            <select id="tipo" name="tipo" class="form-select">
                                <option value="">Selecione...</option>
                                <option value="Entrada">Entrada</option>
								<option value="Saida">Saida</option>
                            </select>
                        </div>

						<div class="col-md-2">
                            <label for="quantidade" class="form-label">Quantidade <span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade', 0) }}">
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i>Salvar Movimentação
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
		</div>
	</div>
</body>