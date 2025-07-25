<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulta de Categorias</title>
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
            <h2 class="mb-4 text-center">Consulta de Categorias</h2>
                
			<!-- Bloco de Título e Botão -->
            <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Categorias Encontradas</h5>
                <a href="{{ route('criar-categoria') }}" class="btn btn-sm btn-success">
                    <i class="bi bi-plus-circle"></i> Nova Categoria
				</a>
            </div>


                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="categorias-container">
                    @forelse ($categorias as $categoria)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title text-primary-emphasis">
                                        <i class="bi bi-tags"></i> {{ $categoria->nome }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Nenhuma categoria encontrada.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</body>
</html>
