<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de Produtos</title>
    <link rel="icon" type="image/png" href="{{ asset('faesa_favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #content-wrapper {
            height: calc(100vh - 56px);
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            width: 100%;
            background-color: #f8f9fa;
        }
        .card .list-group-item {
            font-size: 0.95rem;
        }
    </style>
</head>

<body>
    @include('components.navbar')

    <div id="content-wrapper">
        <div class="bg-white p-4 rounded shadow-sm w-100">
            <h2 class="mb-4 text-center">Consulta de Produtos</h2>

            <!-- Bloco de Cards -->
            <div class="w-100">
                <h5 class="mb-3">Produtos Encontrados</h5>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="produtos-container">
                    @forelse ($produtos as $produto)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">
                                        <i class="bi bi-box-seam"></i> {{ $produto['nome_prod'] }} - {{ $produto['cod_prod'] }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $produto['desc_prod'] }}
                                    </h6>

                                    <ul class="list-group list-group-flush mt-3 mb-3">
                                        <li class="list-group-item">
                                            <i class="bi bi-building"></i>
                                            <strong>Almoxarifado:</strong> 
                                            <br>{{ $almoxarifados[$produto['almox_id']-1]['nome'] ?? '-' }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-archive"></i>
                                            <strong>Quantidade:</strong>
                                            <br><span class="{{ $produto['quant_prod'] < $produto['quant_min_prod'] ? 'text-danger fw-bold' : '' }}">
                                                {{ $produto['quant_prod'] }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <strong>Qtd. Mínima:</strong>
                                            <br>{{ $produto['quant_min_prod'] }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-tags"></i>
                                            <strong>Categoria:</strong> 
                                            <br>{{ $categorias[$produto['categoria_id']-1]['nome'] ?? '-'  }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-diagram-3"></i>
                                            <strong>Grupo:</strong> 
                                            <br>{{ $grupos[$produto['grupo_id']-1]['nome'] ?? '-' }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('edit', $produto['id']) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Nenhum produto encontrado.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>
