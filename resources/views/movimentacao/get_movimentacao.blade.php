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

                <form id="search-form" class="mb-4">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="produto_id" id="search_produto_id" class="form-select">
                                <option value="">Produto</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome_prod }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="almoxarifado_id" id="search_almoxarifado_id" class="form-select">
                                <option value="">Almoxarifado</option>
                                @foreach ($almoxarifados as $almoxarifado)
                                    <option value="{{ $almoxarifado->id }}">{{ $almoxarifado->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select id="search_tipo" class="form-select">
                                <option value="">Tipo</option>
                                <option value="Entrada">Entrada</option>
                                <option value="Saida">Saída</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="usuario_id" id="search_usuario_id" class="form-select">
                                <option value="">Usuário</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->id_usuario_estoque }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="button" id="search-button">Buscar</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Produto</th>
                                <th>Almoxarifado</th>
                                <th>Tipo</th>
                                <th>Saldo</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>
                        <tbody id="movimentacoes-list">
                        </tbody>
                    </table>
                </div>
		</div>
	</div>
</body>
<script>
    const movimentacoesList = document.getElementById('movimentacoes-list');
    const searchForm = document.getElementById('search-form');
    const searchButton = document.getElementById('search-button');
    const searchProdutoId = document.getElementById('search_produto_id');
    const searchAlmoxarifadoId = document.getElementById('search_almoxarifado_id');
    const searchTipo = document.getElementById('search_tipo');
    const searchUsuarioId = document.getElementById('search_usuario_id');

    searchButton.addEventListener('click', () => {
        fetch(`/movimentacoes/filtrar?prod=${searchProdutoId.value}&almox=${searchAlmoxarifadoId.value}&tipo=${searchTipo.value}&user=${searchUsuarioId.value}`)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                movimentacoesList.innerHTML = '<tr><td colspan="5" class="text-center">Nenhuma movimentação encontrada.</td></tr>';
                return;
            }
            movimentacoesList.innerHTML = '';
            data.forEach(movimentacao => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${movimentacao.produto.nome_prod}</td>
                    <td>${movimentacao.almoxarifado.nome}</td>
                    <td>${movimentacao.tipo}</td>
                    <td>${movimentacao.saldo}</td>
                    <td>${movimentacao.usuario.id_usuario_estoque}</td>
                `;
                movimentacoesList.appendChild(row);
            });
        });
    });

    searchForm.addEventListener('submit', (event) => {
        event.preventDefault();
        searchButton.click();
    });

    window.addEventListener('DOMContentLoaded', () => {
        // Trigger search on page load if needed
        searchButton.click();
    });
</script>
</html>