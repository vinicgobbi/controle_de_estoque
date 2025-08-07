<?php

namespace App\Http\Controllers;

use App\Models\EstoqueAlmoxarifado;
use App\Models\EstoqueMovimentacao;
use App\Models\EstoqueProduto;
use App\Models\EstoqueSaldo;
use App\Models\EstoqueUsuario;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function getMovimentacao()
    {
        $movimentacoes = EstoqueMovimentacao::all();
        $produtos = EstoqueProduto::all();
        $almoxarifados = EstoqueAlmoxarifado::all();
        $usuarios = EstoqueUsuario::all();
        return view('movimentacao.get_movimentacao', compact('movimentacoes', 'produtos', 'almoxarifados', 'usuarios'));
    }

    public function getMovimentacaoWithFilters(Request $request)
    {
        $movimentacao = EstoqueMovimentacao::query();

        if ($request->filled('prod')) {
            $movimentacao->where('produto_id', $request->input('prod'));
        }

        if ($request->filled('almox')) {
            $movimentacao->where('almoxarifado_id', $request->input('almox'));
        }

        if ($request->filled('tipo')) {
            $movimentacao->where('tipo', $request->input('tipo'));
        }

        if ($request->filled('user')) {
            $movimentacao->where('usuario_id', $request->input('user'));
        }

        $movimentacoes = $movimentacao->with(['produto', 'almoxarifado', 'usuario'])->get();

        return response()->json($movimentacoes);
    }

    public function createMovimentacao(Request $request)
    {
        $validated = $request->validate([
            'produto_id' => 'required|integer',
            'almoxarifado_id' => 'required|integer',
            'tipo' => 'required|string',
            'saldo' => 'required|integer|min:1|max:500',
        ],[
            'produto_id.required' => 'Selecione um saldo antes de continuar',
            'tipo.required' => 'Selecione o tipo de movimentação para prosseguir',
            'saldo.required' => 'Informe uma saldo para poder realizar a movimentação',
            'saldo.min' => 'Informe uma saldo para poder realizar a movimentação',
            'saldo.max' => 'A saldo informada ultrapassou o limite permitido por movimentação'
        ]);

        $saldo = EstoqueSaldo::where('produto_id', $validated['produto_id'])
            ->where('almoxarifado_id', $validated['almoxarifado_id'])
            ->first();


        $validated['usuario_id'] = session('usuario')->first()->id;

        if ($validated['tipo'] == 'Entrada') {
            if (!$saldo) {
                $saldo = EstoqueSaldo::create($validated);
            }
            EstoqueMovimentacao::create($validated);
        } else {
            if (!$saldo) {
                return redirect()
                ->route('create-movimentacao')
                ->with('error', 'Não é possível realizar a saída de um item sem estoque')
                ->withInput();
            }

            if ($saldo->saldo <= 0) {
                return redirect()
                ->route('create-movimentacao')
                ->with('error', 'Não é possível realizar a saída de um item sem estoque')
                ->withInput();
            }
            else if ($saldo->saldo - $validated['saldo'] <= 0) {
                return redirect()
                ->route('create-movimentacao')
                ->with('error', 'O saldo não é suficiente para realizar essa saída')
                ->withInput();
            }else {
                $saldo->saldo -= $validated['saldo'];
                EstoqueMovimentacao::create($validated);   
            }
           
        }

        $saldo->save();

        return redirect()->route('movimentacoes')->with('success', 'Movimentação gerada com sucesso');
    }
}
