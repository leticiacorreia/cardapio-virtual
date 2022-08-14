@extends('layouts.layout')

@section('content')
<div class="bg-light px-4 py-4">
  <h1>Editar Funcionário</h1>
  <div class="d-flex mb-4 justify-content-start">
    <form method="POST" action="{{route('user.update', $user->id)}}">
      @csrf
      @method('PUT')
      <div class="d-flex flex-row gap-2">
        <div class="w-100 mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
        </div>
      </div>

      <div class="d-flex flex-row gap-2">
        <div class="w-50 mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" value="{{$user->cpf}}">
        </div>
        <div class="w-50 mb-3">
          <label for="phone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="Ex: +55(42)988236787">
        </div>
      </div>

      <div class="d-flex flex-row gap-2">
        <div class="w-50 mb-3">
          <label for="login" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
        </div>

        <div class="w-50 mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>
      <div class="d-flex flex-row gap-2">
        <div class="w-75 mb-3">
          <label for="select_type" class="form-label">Tipo :</label>
          <select id="select_type" name="type" class="form-select" aria-label="funcionário">
            <option value="manager" @if($user->isManager()) selected @endif>Gerente</option>
            <option value="employee" @if(!$user->isManager()) selected @endif>Funcionário</option>
          </select>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-start gap-2">
        <button class="btn btn-primary" type="submit">
          <i class="bi bi-clipboard-plus"></i>
            Alterar
        </button>
        <a href="{{route('user.index')}}" class="btn btn-outline-primary">
          Voltar
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
