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
    public function index()
    {
        $produtos = EstoqueProduto::all();
        $almoxarifados = EstoqueAlmoxarifado::all()->toArray();
        $grupos = EstoqueGrupo::all()->toArray();
        $categorias = EstoqueCategoria::all()->toArray();
        $unidades = EstoqueUnidade::all()->toArray();
        return view('get_produto', compact('produtos', 'almoxarifados', 'grupos', 'categorias', 'unidades'));
    }

    // GET
    public function getProduto()
    {
        return EstoqueProduto::all();
    }

    public function createProduto(Request $request)
    {
        $validated = $request->validate([
            'nome_prod'      => 'required|string|max:50',
            'cod_prod'       => 'nullable|string|size:6|regex:/^\d{6}$/|unique:estoque_produto,cod_prod',
            'desc_prod'      => 'nullable|string|max:255',
            'quant_min_prod' => 'nullable|integer|min:0',
            'almox_id'       => 'required|integer|exists:estoque_almoxarifado,id',
            'categoria_id'   => 'required|integer|exists:estoque_categoria,id',
            'grupo_id'       => 'required|integer|exists:estoque_grupo,id',
        ], [
            'nome_prod.required'    => 'Digite o nome do produto antes de continuar',
            'almox_id.required'     => 'Informe em qual almoxarifado o produto vai estar antes de continuar',
            'categoria_id.required' => 'Defina um categoria antes de continuar',
            'grupo_id.required'     => 'Defina um grupo antes de continuar',
        ]);

        $produto = new EstoqueProduto($validated);

        // Se cod_prod não foi informado, gerar código com base no próximo ID
        if (empty($validated['cod_prod'])) {
            // Recupera o próximo ID futuro com base no AUTO_INCREMENT
            $nextId = DB::table('estoque_produto')->max('id') + 1;
            $produto->cod_prod = str_pad($nextId, 6, '0', STR_PAD_LEFT);
        }

        $produto->save();

        return redirect()->route('index')->with('success', 'Produto criado com sucesso.');
    }

    public function updateProduto(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome_prod'      => 'required|string|max:50',
            'cod_prod'       => 'nullable|string|size:6|regex:/^\d{6}$/|unique:estoque_produto,cod_prod',
            'desc_prod'      => 'nullable|string|max:255',
            'quant_prod'     => 'integer|min:0',
            'quant_min_prod' => 'nullable|integer|min:0',
            'almox_id'       => 'required|integer|exists:estoque_almoxarifado,id',
            'categoria_id'   => 'required|integer|exists:estoque_categoria,id',
            'grupo_id'       => 'required|integer|exists:estoque_grupo,id',
            'unidade_id'     => 'required|integer|exists:estoque_unidade,id'
        ], [
            'nome_prod.required'    => 'Digite o nome do produto antes de continuar',
            'quant_prod.required'   => 'Digite a quantidade do Produto antes de continuar',
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
        return view('edit_produto', compact('produto', 'categorias', 'grupos', 'almoxarifados'));
    }


    public function deleteProduto()
    {

    }
}
