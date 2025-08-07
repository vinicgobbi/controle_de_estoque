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
        $almoxarifados = EstoqueAlmoxarifado::all()->toArray();
        $grupos = EstoqueGrupo::all()->toArray();
        $categorias = EstoqueCategoria::all()->toArray();
        $unidades = EstoqueUnidade::all()->toArray();
        return view('produto.get_produto', compact('produtos', 'almoxarifados', 'grupos', 'categorias', 'unidades'));
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
