@extends('layouts.layout')

@section('content')
  <div class="bg-light px-4 py-4">
    <div class="d-flex mb-4 justify-content-between">
      <h1>Funcionários</h1>

      <!-- Button trigger modal -->
      <div>
        <a class="btn btn-primary me-2" href="{{route('user.create')}}">Criar Novo</a>
      </div>

      <!-- Modal -->
      <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Funcionário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="d-flex flex-row gap-2">
                  <div class="w-50 mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name">
                  </div>

                  <div class="w-50 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                  </div>
                </div>

                <div class="d-flex flex-row gap-2">
                  <div class="w-75 mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address">
                  </div>

                  <div class="w-25 mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Ex: +55(42)988236787">
                  </div>
                </div>

                <div class="d-flex flex-row gap-2">
                  <div class="w-50 mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="email" class="form-control" id="login" name="login">
                  </div>

                  <div class="w-50 mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                Fechar
              </button>
              <button class="btn btn-primary" data-bs-dismiss="modal">
                <i class="bi bi-clipboard-plus"></i>
                Adicionar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone</th>
          <th>Tipo de usuário</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->cpf}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->type == 'manager' ? 'Gerente' : 'Funcionário'}}</td>
            {{-- Ações: Editar e Remover --}}
            <td colspan="2" class="d-flex flex-row gap-1">
              <a href="{{route('user.edit', $user->id)}}" class="btn btn-outline-primary">
                <i class="bi bi-pencil-fill"></i>
              </a>
              @if(\Auth::user()->isManager())
              <form method="POST" action="{{route('user.destroy', $user->id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              @endif
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
    {{ $users->links() }}
  </div>
@endsection
