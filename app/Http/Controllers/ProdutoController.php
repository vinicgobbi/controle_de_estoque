<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstoqueMedProduto;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('Produto.index');
    }

    // GET
    public function show()
    {
        return EstoqueMedProduto::all();
    }

    public function createProduto(Request $request)
    {

        // Validação simples dos dados recebidos
        $validated = $request->validate([
            'COD_PROD'       => 'required|string|max:50',
            'ALMOX_PROD'     => 'nullable|string|max:50',
            'DESC_PROD'      => 'nullable|string|max:255',
            'QUANT_PROD'     => 'nullable|integer|min:0',
            'QUANT_MIN_PROD' => 'nullable|integer|min:0',
            'CATEGORIA_ID'   => 'nullable|integer|exists:CATEGORIA,ID',
            'GRUPO_ID'       => 'nullable|integer|exists:GRUPO,ID',
        ]);

        // Cria o produto com os dados validados
        $produto = EstoqueMedProduto::create($validated);

        // Retorna resposta JSON com sucesso e dados do produto criado
        return response()->json([
            'message' => 'Produto criado com sucesso',
            'produto' => $produto
        ], 201);
    }

    public function updateProduto()
    {

    }

    public function deleteProduto()
    {

    }
}
