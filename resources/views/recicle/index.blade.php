@extends('recicle.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastro de reciclagem</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recicle.create') }}"> Adicionar novo cadastro</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Indice</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Descrição</th>
            <th>Tipo Reciclagem</th>
            <th width="350px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nome }}</td>
            <td>{{ $value->endereco }}</td>
            <td>{{ $value->descricao }}</td>
            <td>{{ $value->tipoReciclagem }}</td>
            <td>
                <form action="{{ route('recicle.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('recicle.show',$value->id) }}">Relatorio</a>    
                    <a class="btn btn-primary" href="{{ route('recicle.edit',$value->id) }}">Editar</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection