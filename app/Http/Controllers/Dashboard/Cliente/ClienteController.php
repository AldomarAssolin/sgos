<?php

namespace App\Http\Controllers\Dashboard\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\OrdemServico;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        $totalClientes = Cliente::count();
        $totalServicos = Servico::count();
        $totalOrdens = OrdemServico::count();

        return view('clientes.index', compact('clientes', 'totalClientes', 'totalServicos', 'totalOrdens'));
    }

    /**
     * Sidebar
     */
    public function counts()
    {
        $clientes = Cliente::all();
        $totalClientes = Cliente::count();
        $totalServicos = Servico::count();
        $totalOrdens = OrdemServico::count();

        return view('dashboard', compact('clientes', 'totalClientes', 'totalServicos', 'totalOrdens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required | max:100',
            'email' => 'required | email | unique:tb_clientes| max:100',
            'telefone' => 'required | max:20',
            'endereco' => 'required | max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required | max:100',
            'email' => 'required | email | unique:tb_clientes,email, '.$cliente->id.' | max:100',
            'telefone' => 'required | max:20',
            'endereco' => 'required | max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso.');
    }
    
}
