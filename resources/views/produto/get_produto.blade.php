<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de Produtos</title>
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
            <h2 class="mb-4 text-center">Consulta de Produtos</h2>

                <!-- Bloco de Título e Botão -->
                <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Produtos Encontrados</h5>
                    <a href="{{ route('criar-produto') }}" class="btn btn-sm btn-success fs-6">
                        <i class="bi bi-plus-circle"></i> Novo Produto
                    </a>
                </div>


                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="produtos-container">
                    @forelse ($produtos as $produto)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">
                                        <i class="bi bi-box-seam"></i> {{ $produto['id'] }} | {{ $produto['nome_prod'] }}
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $produto['desc_prod'] }}
                                    </h6>

                                    <ul class="list-group list-group-flush mt-3 mb-3">
                                        <li class="list-group-item">
                                            <i class="bi bi-puzzle-fill"></i>
                                            <strong>Unidade:</strong> 
                                            <br>  {{ $unidades[$produto['unidade_id']-1]['descricao'] ?? '-' }} ({{ $unidades[$produto['unidade_id']-1]['nome'] ?? '-' }})
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
                                    <a href="{{ route('edit', $produto['id']) }}" class="btn btn-sm btn-primary fs-6">
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
