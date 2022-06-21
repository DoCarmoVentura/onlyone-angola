@extends('produtos.layout')
   
@section('conteudo')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edição do Produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ocorreram alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('produtos.update',$produto->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $produto->nome }}" class="form-control" placeholder="Nome do produto">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <input type="text" name="descricao" value="{{ $produto->descricao }}" class="form-control" placeholder="Descrição do produto">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input type="text" name="preco" value="{{ $produto->preco }}" class="form-control" placeholder="Preço do produto">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Link:</strong>
                    <input type="text" name="link" value="{{ $produto->link }}" class="form-control" placeholder="Link do produto">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Imagem:</strong>
                    <input type="file" name="imagem" value="{{ $produto->imagem }}" class="form-control" placeholder="Imagem do produto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Gravar </button>
            </div>
        </div>
   
    </form>
@endsection
