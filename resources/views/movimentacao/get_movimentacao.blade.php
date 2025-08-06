<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de Movimentações</title>
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

			    <h2 class="mb-4 text-center">Consulta de Movimentações</h2>

                <!-- Bloco de Título e Botão -->
                <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Movimentações Encontradas</h5>
                    <a href="{{ route('criar-movimentacao') }}" class="btn btn-sm btn-success fs-6">
                        <i class="bi bi-plus-circle"></i> Nova Movimentação
                    </a>
                </div>

				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="categorias-container">
                    @forelse ($movimentacoes as $movimentacao)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-primary-emphasis">
                                        <i class="bi bi-diagram-3"></i> {{ $produtos[$movimentacao->produto_id - 1]['nome_prod'] }}
                                    </h5>
                                    <h5 class="card-subtitle mb-2 text-secondary">
                                       <i class="bi bi-tags"></i> {{ $movimentacao->tipo }} | {{ $movimentacao->quantidade }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Nenhum grupo encontrado.</div>
                        </div>
                    @endforelse
                </div>
		</div>
	</div>
</body>