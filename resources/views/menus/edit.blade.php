@extends('layouts.layout')

@section('content')
<div class="d-flex flex-column">
  <h2>Editar Cardápio</h2>

  <form class="gap-2" action="{{route('menu.update', $menu->id)}}" method="post">
    @csrf
    @method('put')
    @include('menus._form')
  </form>
</div>

@endsection
