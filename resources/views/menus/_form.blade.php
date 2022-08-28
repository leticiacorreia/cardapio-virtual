<div class="mb-3 d-flex flex-column gap-3">
  <div class="form-group">
    <label for="name" class="form-label">Título:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $menu->name)}}">
    @error('name')
    <div class="text-danger">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="name" class="form-label">Descrição:</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description', $menu->description)}}">
    @error('description')
    <div class="text-danger">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group form-check form-switch d-flex align-items-end gap-2">
    <input class="form-check-input" type="checkbox" name="is_active" id="flexSwitchCheckChecked" @if(old('is_active', $menu->is_active))checked @endif>
    <label class="form-check-label" for="flexSwitchCheckChecked">Ativar Cardápio</label>
    @error('is_active')
    <div class="text-danger">
      {{ $message }}
    </div>
    @enderror
  </div>
</div>

<div class="d-flex pb-4 justify-content-between">
  <a href="{{route('menu.index')}}" class="btn btn-light">
    <i class="bi bi-arrow-left me-1"></i>
    Voltar
  </a>
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i>
    Salvar
  </button>
</div>
