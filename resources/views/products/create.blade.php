@extends('layouts.layout')

@section('content')
  <h2>Criar Produto</h2>

  <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    @include('products._form')
  </form>
@endsection
