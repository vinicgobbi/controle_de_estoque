<?php

namespace App\Http\Controllers;

use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueCategoria;
use App\Models\EstoqueGrupo;
use Illuminate\Http\Request;
use App\Models\EstoqueProduto;
use App\Models\EstoqueUnidade;
use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller
{

    // GET
    public function getProduto()
    {
        $produtos = EstoqueProduto::all();
        $almoxarifados = EstoqueAlmoxarifado::all();
        $grupos = EstoqueGrupo::all();
        $categorias = EstoqueCategoria::all();
        $unidades = EstoqueUnidade::all();
        return view('produto.get_produto', compact('produtos', 'almoxarifados', 'grupos', 'categorias', 'unidades'));
    }

    public function getProdutoWithFilters(Request $request)
    {
        $produto = EstoqueProduto::query();


        if ($request->filled('nome_prod')) {
            $produto->where('nome_prod', 'like', '%' . $request->input('nome_prod') . '%');
        }
        
        if ($request->filled('desc_prod')) {
            $produto->where('desc_prod', 'like', '%' . $request->input('desc_prod') . '%');
        }

        if ($request->filled('categoria_id')) {
            $produto->where('categoria_id', $request->input('categoria_id'));
        }

        if ($request->filled('grupo_id')) {
            $produto->where('grupo_id', $request->input('grupo_id'));
        }

        if ($request->filled('unidade_id')) {
            $produto->where('unidade_id', $request->input('unidade_id'));
        }

        $produtos = $produto->with(['grupo', 'unidade', 'categoria'])->get();

        return response()->json($produtos);
    }

    public function createProduto(Request $request)
    {
        $validated = $request->validate([
            'nome_prod'      => 'required|string|max:50',
            'desc_prod'      => 'nullable|string|max:255',
            'quant_min_prod' => 'nullable|integer|min:0',
            'categoria_id'   => 'required|integer|exists:estoque_categoria,id',
            'grupo_id'       => 'required|integer|exists:estoque_grupo,id',
            'unidade_id'     => 'required|integer|exists:estoque_unidade,id'
        ], [
            'nome_prod.required'    => 'Digite o nome do produto antes de continuar',
            'almox_id.required'     => 'Informe em qual almoxarifado o produto vai estar antes de continuar',
            'categoria_id.required' => 'Defina um categoria antes de continuar',
            'grupo_id.required'     => 'Defina um grupo antes de continuar',
            'unidade_id.required'   => 'Defina uma unidade antes de começar'
        ]);

        EstoqueProduto::create($validated);

        return redirect()->route('index')->with('success', 'Produto criado com sucesso.');
    }

    public function updateProduto(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome_prod'      => 'required|string|max:50',
            'desc_prod'      => 'nullable|string|max:255',
            'quant_min_prod' => 'nullable|integer|min:0',
            'categoria_id'   => 'required|integer|exists:estoque_categoria,id',
            'grupo_id'       => 'required|integer|exists:estoque_grupo,id',
            'unidade_id'     => 'required|integer|exists:estoque_unidade,id'
        ], [
            'nome_prod.required'    => 'Digite o nome do produto antes de continuar',
            'almox_id.required'     => 'Informe em qual almoxarifado o produto vai estar antes de continuar',
            'categoria_id.required' => 'Defina um categoria antes de continuar',
            'grupo_id.required'     => 'Defina um grupo antes de continuar',
        ]);

        // Busca o produto pelo ID
        $produto = EstoqueProduto::findOrFail($id);

        // Atualiza com os dados validados
        $produto->update($validated);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $produto = EstoqueProduto::findOrFail($id);
        $almoxarifados = EstoqueAlmoxarifado::all();
        $categorias = EstoqueCategoria::all();
        $grupos = EstoqueGrupo::all();
        $unidades = EstoqueUnidade::all();
        return view('produto.edit_produto', compact('produto', 'categorias', 'grupos', 'almoxarifados', 'unidades'));
    }


    public function deleteProduto()
    {

    }
}
