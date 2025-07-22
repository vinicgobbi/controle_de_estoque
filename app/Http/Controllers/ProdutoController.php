<?php

namespace App\Http\Controllers;

use App\Models\EstoqueMedCategoria;
use App\Models\EstoqueMedGrupo;
use Illuminate\Http\Request;
use App\Models\EstoqueMedProduto;

class ProdutoController extends Controller
{
    public function index()
    {
        $data = EstoqueMedProduto::all();
        return view('get_produto', compact('data'));
    }

    // GET
    public function getProduto()
    {
        return EstoqueMedProduto::all();
    }

    public function createProduto(Request $request)
    {

        // Validação simples dos dados recebidos
        $validated = $request->validate([
            'COD_PROD'       => 'required|string|max:50',
            'ALMOX_PROD'     => 'required|string|max:50',
            'DESC_PROD'      => 'required|string|max:255',
            'QUANT_PROD'     => 'required|integer|min:0',
            'QUANT_MIN_PROD' => 'nullable|integer|min:0',
            'CATEGORIA_ID'   => 'required|integer|exists:ESTOQUE_MED_CATEGORIA,ID',
            'GRUPO_ID'       => 'required|integer|exists:ESTOQUE_MED_GRUPO,ID',
        ],
        [
            'COD_PROD.required' => 'Digite o código do produto antes de continuar',
            'ALMOX_PROD.required' => 'Informe em qual almoxarifado o produto vai estar antes de continuar',
            'DESC_PROD.required' => 'Informe a descrição do Produto antes de continuar',
            'QUANT_PROD.required' => 'Digite a quantidade do Produto antes de continuar',
            'CATEGORIA_ID.required' => 'Defina um categoria antes de continuar',
            'GRUPO_ID.required' => 'Defina um grupo antes de continuar',
        ]);

        // Cria o produto com os dados validados
        $produto = EstoqueMedProduto::create($validated);

        // Retorna resposta JSON com sucesso e dados do produto criado
        return response()->json([
            'message' => 'Produto criado com sucesso',
            'produto' => $produto
        ], 201);
    }

    public function updateProduto(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'COD_PROD'       => 'required|string|max:50',
            'ALMOX_PROD'     => 'nullable|string|max:50',
            'DESC_PROD'      => 'nullable|string|max:255',
            'QUANT_PROD'     => 'nullable|integer|min:0',
            'QUANT_MIN_PROD' => 'nullable|integer|min:0',
            'CATEGORIA_ID'   => 'nullable|integer|exists:ESTOQUE_MED_CATEGORIA,ID',
            'GRUPO_ID'       => 'nullable|integer|exists:ESTOQUE_MED_GRUPO,ID',
        ]);

        // Busca o produto pelo ID
        $produto = EstoqueMedProduto::findOrFail($id);

        // Atualiza com os dados validados
        $produto->update($validated);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $produto = EstoqueMedProduto::findOrFail($id);
        $categorias = EstoqueMedCategoria::all();
        $grupos = EstoqueMedGrupo::all();
        return view('edita_produto', compact('produto', 'categorias', 'grupos'));
    }


    public function deleteProduto()
    {

    }
}
