@extends('layouts.layout')

@section('content')
<div class="bg-light px-4 py-4">
  <h3>Detalhes de Funcionário</h3>
  <div class="d-flex mb-4 justify-content-between">


      <ul class="list-group w-100">
        <li class="list-group-item list-group-item-action active"><strong>Nome: </strong>{{$user->name}}</li>
        <li class="list-group-item  list-group-item-action  list-group-item-light"><strong>Email: </strong>{{$user->email}}</li>
        <li class="list-group-item  list-group-item-action  list-group-item-light"><strong>Tipo: </strong>{{$user->isManager() ? 'Gerente' : 'Funcionário'}}</li>
        <li class="list-group-item  list-group-item-action  list-group-item-light"><strong>CPF: </strong>{{$user->cpf}}</li>
        <li class="list-group-item  list-group-item-action  list-group-item-light"><strong>Telefone: </strong>{{$user->phone}}</li>
      </ul>
  </div>
  <div class="d-flex justify-content-start">

    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">
      <i class="bi bi-pencil-fill"></i>
      Editar
    </a>
  </div>
</div>
@endsection
