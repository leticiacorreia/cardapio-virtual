@extends('layouts.layout')

@section('content')
    <div class="bg-light py-4 px-4">
      <div class="d-flex mb-4 justify-content-between">
        <h1>Cardápios</h1>
        <div>
          <a href="{{route('menu.create')}}" type="button" class="btn btn-primary me-2">Criar Novo</a>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Cód.</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($menus as $menu)
          <tr>
            <th scope="row">{{$menu->id}}</th>
            <td>{{$menu->name}}</td>
            <td>{{$menu->description}}</td>
            <td>{{$menu->is_active ? 'Ativo' : 'Inativo'}}</td>
            <td>{{$menu->created_at}}</td>
            <td>{{$menu->updated_at}}</td>
            <td class="d-flex flex-row gap-1">
              <a href="{{route('menu.edit', $menu->id)}}" class="btn btn-outline-primary">
                <i class="bi bi-pencil-fill"></i>
              </a>

              <form method="POST" action="{{route('menu.destroy', $menu->id)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
@endsection
