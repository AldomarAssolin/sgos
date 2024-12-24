@extends('layouts.app')

@section('content_header')
<div class="card-header">
    <h3 class="card-title">Criar novo Serviço</h3>
    <div class="card-tools">
        <a href="{{ route('servicos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
    </div>
</div>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('servicos.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Descrição</label>
                            <input type="text" class="form-control" id="text" name="descricao" required>
                        </div>

                        <div class="form-group">
                            <label for="telefone">Preço</label>
                            <input type="text" class="form-control" id="telefone" name="preco" required>
                        </div>

                        <div class="form-group">
                            <label for="endereco">Data Início</label>
                            <input type="date" class="form-control" id="endereco" name="create_at" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
