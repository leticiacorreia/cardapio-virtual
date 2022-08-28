@extends('layouts.layout')

@section('content')
<div class="d-flex flex-column">
  <h2>Criar Cardápio</h2>

  <form class="gap-2" action="{{route('menu.store')}}" method="post">
    @csrf
    @include('menus._form')
  </form>
</div>

@endsection
