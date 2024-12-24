<?php

namespace App\Http\Controllers\Dashboard\Ordens;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\OrdemServico;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordemServico = OrdemServico::with(['cliente', 'servico'])->get();

        return view('ordem_servicos.index', compact('ordemServico'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('ordem_servicos.create', compact('clientes', 'servicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required | exists:tb_clientes,id',
            'servico_id' => 'required | exists:tb_servicos,id',
            'data' => 'required | date',
            'valor' => 'required | numeric | min:0',
            'status' => 'required | in:aberta,em_andamento,concluida,cancelada',
            'observacoes' => 'nullable',
        ]);

        OrdemServico::create($request->all());

        return redirect()->route('ordem_servicos.index')
            ->with('success', 'Ordem de serviço cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServico $ordemServico)
    {
        return view('ordem_servicos.show', compact('ordemServico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdemServico $ordemServico)
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('ordem_servicos.edit', compact('ordemServico', 'clientes', 'servicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        $request->validate([
            'cliente_id' => 'required | exists:tb_clientes,id',
            'servico_id' => 'required | exists:tb_servicos,id',
            'data_abertura' => 'required | date',
            'data_conclusao' => 'required | date',
            'valor' => 'required | numeric | min:0',
            'status' => 'required | in:aberta,em_andamento,concluida,cancelada',
            'observacoes' => 'nullable',
        ]);

        $ordemServico->update($request->all());

        return redirect()->route('ordem_servicos.index')
            ->with('success', 'Ordem de serviço atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServico $ordemServico)
    {
        $ordemServico->delete();

        return redirect()->route('ordem_servicos.index')
            ->with('success', 'Ordem de serviço excluída com sucesso.');
    }
}
