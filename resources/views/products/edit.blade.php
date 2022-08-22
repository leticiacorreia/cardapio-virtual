@extends('layouts.layout')

@section('content')
  <h2>Editar Produto</h2>
  <p class="fs-6 text-muted">Você está visualizando o produto:
  <strong>{{$product->description}}</strong></p>

  <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
    @method('put')
    @csrf
    @include('products._form')
  </form>
@endsection
