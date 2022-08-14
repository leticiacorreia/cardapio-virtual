@extends('layouts.layout')

@section('content')
<div class="bg-light px-4 py-4">
  <h3>Detalhes de Funcionário</h3>
  <div class="d-flex mb-4 justify-content-between">


      <ul class="list-group w-100">
        <li class="list-group-item"><strong>Nome: </strong>{{$user->name}}</li>
        <li class="list-group-item"><strong>Email: </strong>{{$user->email}}</li>
        <li class="list-group-item"><strong>Tipo: </strong>{{$user->isManager() ? 'Gerente' : 'Funcionário'}}</li>
        <li class="list-group-item"><strong>CPF: </strong>{{$user->cpf}}</li>
        <li class="list-group-item"><strong>Telefone: </strong>{{$user->phone}}</li>
      </ul>
  </div>
  <div class="d-flex justify-content-start gap-2">

    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">
      <i class="bi bi-pencil-fill"></i>
      Editar
    </a>
    <a href="{{route('user.index')}}" class="btn btn-outline-primary">
      Voltar
    </a>
  </div>
</div>
@endsection
