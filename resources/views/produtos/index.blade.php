@extends('produtos.layout')
 
@section('conteudo')
    <div class="row">
        <div class="">
            <div class="">
                <h2>Produtos</h2>
            </div>
            
        </div>
    </div>
    <div class="">
        <a class="btn btn-success" href="{{ route('produtos.create') }}"> Novo Produto</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Link</th>
            <th>Imagem</th>

            <th width="280px">Operações</th>
        </tr>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->preco }}</td>
            <td>{{ $produto->link }}</td>
            <td>{{ $produto->imagem }}</td>
            
            <td>
                <form action="{{ route('produtos.destroy',$produto->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('produtos.show',$produto->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('produtos.edit',$produto->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $produtos->links() !!}
      
@endsection