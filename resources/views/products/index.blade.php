@extends('layouts.layout')

@section('content')
  <div class="bg-light px-4 py-4">
    <div class="d-flex mb-4 justify-content-between">
      <h1>Produtos</h1>
      <!-- Button trigger modal -->
      <div>
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Criar Novo</button>
      </div>

      <!-- Modal -->
      <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Produto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('product.store')}}">
                @csrf
                <div class="d-flex flex-row gap-2">

                  <div class="mb-3 w-50">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ex: Batata Frita do Chef">
                  </div>
                  <div class="mb-3 w-50">
                    <label for="price" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="price" name="price_cents" placeholder="Ex: R$12,99">
                  </div>
                </div>


                <div class="mb-3">
                  <label for="description" class="form-label">Descrição</label>
                  <textarea class="form-control" id="description" name="description" placeholder="Ex: Porção grande de batata frita, serve duas pessoas"></textarea>
                </div>

                <div class="d-flex flex-row gap-2">
                  <div class="mb-3 w-50">
                    <label for="isAvailable" class="form-label">Disponibilidade</label>
                    <select class="form-select" name="is_available" aria-label="Disponibilidade do prato" id="isAvailable">
                      <option value="1" selected="">Disponível</option>
                      <option value="0">Indisponível</option>
                    </select>
                  </div>
                  <div class="mb-3 w-50">
                    <label for="image" class="form-label">Imagem</label>
                    <input type="file" class="form-control" accept="image/jpeg">
                  </div>

                </div>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                  <i class="bi bi-clipboard-plus"></i>
                  Adicionar
                </button>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                Fechar
              </button>
            </div>
          </div>
        </div>
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
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price_cents}}</td>
            <td>
              <select class="form-select" name="is_available">
                <option value="available" @if($product->available() == 1) selected @endif>Disponível</option>
                <option value="unavailable" @if($product->available() == 0) selected @endif>Indisponível</option>
              </select>
              <td><img src="https://picsum.photos/60/50" width="60" height="50" alt="espetinho"></td>
            </td>
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
