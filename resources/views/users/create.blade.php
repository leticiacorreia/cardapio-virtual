@extends('layouts.layout')

@section('content')
<div class="bg-light px-4 py-4">
  <div class="d-flex mb-4 justify-content-between">
    <h1>Adicionar Novo Funcionário</h1>
    <form method="POST" action="{{route('user.store')}}">
      @csrf
      <div class="d-flex flex-row gap-2">
        <div class="w-100 mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>

      <div class="d-flex flex-row gap-2">
        <div class="w-50 mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf">
        </div>
        <div class="w-50 mb-3">
          <label for="phone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Ex: +55(42)988236787">
        </div>
      </div>

      <div class="d-flex flex-row gap-2">
        <div class="w-50 mb-3">
          <label for="login" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="w-50 mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>
      <div class="d-flex flex-row gap-2">
        <div class="w-50 mb-3">
          <label for="select_type" class="form-label">Tipo :</label>
          <select id="select_type" name="type" class="form-select" aria-label="funcionário">
            <option value="manager" selected>Gerente</option>
            <option value="employee">Funcionário</option>
          </select>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-start">
        <button class="btn btn-primary" type="submit">
          <i class="bi bi-clipboard-plus"></i>
            Adicionar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
