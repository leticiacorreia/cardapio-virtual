<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  </head>
  <body>
    <main class="container pt-4">
      <div class="row gap-2">
        @foreach ($menu->products as $product)
          <div class="card" style="width: 18rem;">
            <img src="{{$product->imageUrl()}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Nome: {{$product->name}}</li>
              <li class="list-group-item">Preço: {{$product->price_cents/100}}</li>
              <li class="list-group-item">{{$product->is_available?'Disponível': 'Indisponível'}}</li>
            </ul>
            <div class="card-body">
            </div>
          </div>
        @endforeach
      </div>
    </main>
  </body>
</html>
