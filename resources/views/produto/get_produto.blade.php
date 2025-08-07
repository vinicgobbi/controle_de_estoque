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

                <!-- Filtro de produtos -->
                <form id="search-form" class="w-100 mb-4">
                    <div>
                        
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <label for="search_nome_prod">Nome do Produto</label>
                            <input type="text" class="form-control" placeholder="Nome do produto" id="search_nome_prod">
                        </div>
                        <div class="col-md-3">
                            <label for="search_desc_prod">Descrição</label>
                            <input type="text" class="form-control" placeholder="Descrição" id="search_desc_prod">
                        </div>
                        <div class="col-md-2">
                            <label for="search_categoria_id">Categoria</label>
                            <select id="search_categoria_id" class="form-select">
                                <option value="">Selecione...</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="search_grupo_id">Grupo</label>
                            <select id="search_grupo_id" class="form-select">
                                <option value="">Selecione...</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="search_unidade_id">Unidade</label>
                            <select id="search_unidade_id" class="form-select">
                                <option value="">Selecione...</option>
                                @foreach ($unidades as $unidade)
                                    <option value="{{ $unidade->id }}">{{ $unidade->descricao }} ({{ $unidade->nome }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="button" id="search-button">Buscar</button>
                    </div>
                </form>


                <div class="table-responsive" style="max-height: 460px; overflow-x: auto;">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="min-width: 30px;">ID</th>
                                <th style="min-width: 180px">Nome</th>
                                <th style="min-width: 250px;">Descrição</th>
                                <th>Unidade</th>
                                <th>Qtd. Mínima</th>
                                <th style="min-width: 180px">Categoria</th>
                                <th style="min-width: 180px">Grupo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id='produtos-list'>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const produtosList = document.getElementById('produtos-list');

    document.getElementById('search-button').addEventListener('click', function() {
        const nomeProd = document.getElementById('search_nome_prod').value;
        const descProd = document.getElementById('search_desc_prod').value;
        const categoriaId = document.getElementById('search_categoria_id').value;
        const grupoId = document.getElementById('search_grupo_id').value;
        const unidadeId = document.getElementById('search_unidade_id').value;

        fetch(`/produtos/filtrar?nome_prod=${nomeProd}&desc_prod=${descProd}&categoria_id=${categoriaId}&grupo_id=${grupoId}&unidade_id=${unidadeId}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    produtosList.innerHTML = '<tr><td colspan="8" class="text-center">Nenhum produto encontrado.</td></tr>';
                    return;
                }
                produtosList.innerHTML = '';
                data.forEach(produto => {
                    const grupoNome = produto.grupo?.nome || '-';
                    const unidadeNome = `${produto.unidade?.descricao} (${produto.unidade?.nome})`|| '-';
                    const categoriaNome = produto.categoria?.nome || '-';
                    const descricaoNome = produto.desc_prod || '-';

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${produto.id}</td>
                        <td>${produto.nome_prod}</td>
                        <td>${descricaoNome}</td>
                        <td>${unidadeNome}</td>
                        <td>${produto.quant_min_prod}</td>
                        <td>${categoriaNome}</td>
                        <td>${grupoNome}</td>
                        <td>
                            <a href="/produtos/${produto.id}/editar" class="btn btn-sm btn-primary fs-6">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    `;
                    produtosList.appendChild(row);
                });
            });
    });

    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault();
        document.getElementById('search-button').click();
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Carrega todos os produtos inicialmente
        fetch('/produtos/filtrar')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    produtosList.innerHTML = '<tr><td colspan="8" class="text-center">Nenhum produto encontrado.</td></tr>';
                    return;
                }
                produtosList.innerHTML = '';
                data.forEach(produto => {
                    const grupoNome = produto.grupo?.nome || '-';
                    const unidadeNome = `${produto.unidade?.descricao} (${produto.unidade?.nome})`|| '-';
                    const categoriaNome = produto.categoria?.nome || '-';
                    const descricaoNome = produto.desc_prod || '-';

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${produto.id}</td>
                        <td>${produto.nome_prod}</td>
                        <td>${descricaoNome}</td>
                        <td>${unidadeNome}</td>
                        <td>${produto.quant_min_prod}</td>
                        <td>${categoriaNome}</td>
                        <td>${grupoNome}</td>
                        <td>
                            <a href="/produtos/${produto.id}/editar" class="btn btn-sm btn-primary fs-6">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </td>
                    `;
                    produtosList.appendChild(row);
                });
            });
    });

</script>
</html>
