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

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    @forelse ($data as $produto)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">
                                        <i class="bi bi-box-seam"></i> {{ $produto['COD_PROD'] }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $produto['DESC_PROD'] }}
                                    </h6>

                                    <ul class="list-group list-group-flush mt-3 mb-3">
                                        <li class="list-group-item">
                                            <i class="bi bi-building"></i>
                                            <strong>Almoxarifado:</strong> {{ $produto['ALMOX_PROD'] ?? '-' }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-archive"></i>
                                            <strong>Quantidade:</strong>
                                            <span class="{{ $produto['QUANT_PROD'] < $produto['QUANT_MIN_PROD'] ? 'text-danger fw-bold' : '' }}">
                                                {{ $produto['QUANT_PROD'] }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <strong>Qtd. Mínima:</strong> {{ $produto['QUANT_MIN_PROD'] }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-tags"></i>
                                            <strong>Categoria ID:</strong> {{ $produto['CATEGORIA_ID'] }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-diagram-3"></i>
                                            <strong>Grupo ID:</strong> {{ $produto['GRUPO_ID'] }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('edit', $produto['ID']) }}" class="btn btn-sm btn-primary">
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
