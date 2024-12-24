@extends('layouts.app')

@section('content_header')
<div class="card-header">
    <h3 class="card-title">Lista de Serviços</h3>
    <div class="card-tools">
        <a href="{{ route('servicos.create') }}" class="btn btn-primary btn-sm">Novo Serviço</a>
    </div>
</div>
@stop

@section('content')

<section class="py-5">
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Data Início</th>
                        <th>Hora de Início</th>
                        <th class="d-flex align-items-center justify-content-end g-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicos as $servico)
                    <tr>
                        <td>{{ $servico->nome }}</td>
                        <td>{{ $servico->descricao }}</td>
                        <td>{{ $servico->preco }}</td>
                        <td>{{ $servico->created_at->format('d/m/Y') }}</td>
                        <td>{{ $servico->created_at->format('H:i') }}</td>
                        <td class="d-flex align-items-center justify-content-end">
                            <a href="{{ route('servicos.edit', $servico) }}" class="btn btn-sm btn-warning mx-2">Editar</a>
                            <form action="{{ route('servicos.destroy', $servico) }}" method="POST" style="display: inline;" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Concluir</button>
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