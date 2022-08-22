@extends('layouts.layout')

@section('content')
  <div class="bg-light px-4 py-4">
    <div class="d-flex mb-4 justify-content-between">
      <h1>Produtos</h1>
      <div>
        <a href="{{route('product.create')}}" type="button" class="btn btn-primary me-2">Criar Novo</a>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Disponibilidade</th>
          <th>Imagem</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>R$ {{number_format($product->price_cents/100, 2, ',', '.')}}</td>
            <td>
              @if($product->available()) Disponível @else Indisponível @endif
            </td>
            <td><img src="{{$product->imageUrl()}}" width="60" height="50" alt="espetinho"></td>
            <td colspan="2" class="d-flex flex-row gap-1">
              <a href="{{route('product.edit', $product->id)}}" class="btn btn-outline-primary">
                <i class="bi bi-pencil-fill"></i>
              </a>

              <form method="POST" action="{{route('product.destroy', $product->id)}}">
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
