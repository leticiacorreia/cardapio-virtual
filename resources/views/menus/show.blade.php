@extends('layouts.layout')
@section('content')
<h3>Você está visualizando o Cardápio:
  <strong>{{$menu->name}}</strong>
</h3>
<div class="d-flex flex-row">
  <ul class="list-group w-100">
    <li class="list-group-item"><strong>Descrição: </strong>{{$menu->description}}</li>
    <li class="list-group-item"><strong>Status: </strong>{{$menu->is_active ? 'Ativo' : 'Inativo'}}</li>
  </ul>
</div>
<div class="d-flex flex-column">
  <h3>Produtos do Cardápio</h3>
  <form action="{{route('menu.product.store', $menu->id)}}" method="post">
    @csrf
    <div class="mb-3 d-flex flex-row gap-3">
      <div>
        <label for="selectproducts">Adicionar produto:</label>
        <select id="selectproducts" class="form-select" name="product_id">
          @foreach($addableProducts as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="d-flex align-items-end">
        <button type="submit" class="btn btn-success rounded" title="Adicionar novo prato">
          <i class="bi bi-clipboard-plus"></i>
        </button>
      </div>
    </div>
  </form>
</div>
<div class="my-4">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Disponibilidade</th>
        <th scope="col">Remover</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menu->products as $product)
        <tr>
          <td><a target="_blank" href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
          <td>{{$product->description}}</td>
          <td>{{$product->price_cents/100}}</td>
          <td>{{$product->is_available ? 'Disponível' : 'Indisponível'}}</td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <form action="{{route('menu.product.destroy', [$menu->id, $product->id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Remover">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
