@extends('layouts.app')

@section('content_header')
<div class="card-header">
    <h3 class="card-title">Lista de Clientes</h3>
    <div class="card-tools">
        <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">Novo Cliente</a>
    </div>
</div>
@stop

@section('content')

<section class="py-5">
    <div class="row pt-3 shadow d-flex align-items-center justify-content-around">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalClientes }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('clientes.index') }}" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalServicos }}</h3>
                    <p>Serviços</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('dashboard') }}" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalOrdens }}</h3>
                    <p>Ordens</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box
                        "></i>
                </div>
                <a href="{{ route('dashboard') }}" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th class="d-flex align-items-center justify-content-end g-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td class="d-flex align-items-center justify-content-end">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning mx-2">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display: inline;" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@stop