<?php

namespace App\Http\Controllers;

use App\Models\EstoqueMovimentacao;
use App\Models\EstoqueProduto;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function getMovimentacao()
    {
        $movimentacoes = EstoqueMovimentacao::all();
        $produtos = EstoqueProduto::all()->toArray();
        return view('movimentacao.get_movimentacao', compact('movimentacoes', 'produtos'));
    }

    public function createMovimentacao(Request $request)
    {
        $validated = $request->validate([
            'produto_id' => 'required|integer',
            'tipo' => 'required|string',
            'quantidade' => 'required|integer|min:1',
        ],[
            'produto_id.required' => 'Selecione um produto antes de continuar',
            'tipo.required' => 'Selecione o tipo de movimentação para prosseguir',
            'quantidade.required' => 'Informe uma quantidade para poder realizar a movimentação',
            'quantidade.min' => 'Informe uma quantidade para poder realizar a movimentação'
        ]);

        $produto = EstoqueProduto::findOrFail($validated['produto_id']);

        

        if ($validated['tipo'] == 'Entrada') {
            $produto->quant_prod += $validated['quantidade'];
            EstoqueMovimentacao::create($validated);
        } else {
            if ($produto->quant_prod <= 0) {
                return redirect()
                ->route('create-movimentacao')
                ->with('error', 'Não é possível realizar a saída de um item sem estoque')
                ->withInput();
            }
            else if ($produto->quant_prod - $validated['quantidade'] <= 0) {
                return redirect()
                ->route('create-movimentacao')
                ->with('error', 'O saldo não é suficiente para realizar essa saída')
                ->withInput();
            }else {
                $produto->quant_prod -= $validated['quantidade'];
                EstoqueMovimentacao::create($validated);   
            }
           
        }

        $produto->save();

        return redirect()->route('movimentacoes')->with('success', 'Movimentação gerada com sucesso');
    }
}
