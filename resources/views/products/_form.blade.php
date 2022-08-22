<div class="mb-3">
  <label for="name" class="form-label">Nome</label>
  <input type="text" name="name" class="form-control" id="name" value="{{old('name', $product->name)}}">
  @error('name')
  <div class="text-danger">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="d-flex felx-row gap-2">
  <div class="mb-3 w-50">
    <label for="description" class="form-label">Descrição</label>
    <textarea class="form-control" id="description" name="description">{{old('description', $product->description)}}</textarea>
    @error('description')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3 w-50">
    <label for="price" class="form-label">Preço</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{old('price', $product->price_cents/100)}}">
    @error('price')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>
</div>

<div class="d-flex flex-row gap-2">
  <div class="mb-3 w-50">
    <label for="isAvailable" class="form-label">Disponibilidade</label>
    <select class="form-select" aria-label="Disponibilidade do prato" name="is_available" id="isAvailable">
      <option value="1" @if(old('is_available', $product->is_available))selected @endif>Disponível</option>
      <option value="0" @if(!(old('is_available', $product->is_available))) selected @endif >Indisponível</option>
    </select>
    @error('is_available')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3 w-50">
    <label for="image" class="form-label">Imagem</label>
    <input type="file" name="image" class="form-control" accept="image/jpeg">
    @error('image')
    <div class="text-danger">
      {{$message}}
    </div>
    @enderror
  </div>
</div>
<div class="d-flex py-4 justify-content-between">
  <a href="{{route('product.index')}}" class="btn btn-light">
    <i class="bi bi-arrow-left me-1"></i>
    Voltar
  </a>
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i>
    Salvar
  </button>
</div>
