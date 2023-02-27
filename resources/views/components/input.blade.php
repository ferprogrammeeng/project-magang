<div class="mt-3 mb-2">
  <label class="form-label d-flex justify-content-between" for="{{ $id }}">
    <span>{{ $label }}</span>
    <span class="text-info ms-2">{{ $slot }}</span>
  </label>
  <input class="form-control d-inline-block
    @error('{{ $id }}') is-invalid @enderror"
    id="{{ $id }}" name="{{ $id }}" data-name="{{ $label }}"
    oninvalid="validate(this)" required
    type="{{ $type }}" value="{{ old($id) }}" />
  @error('{{ $id }}')
    <div class="text-danger"><i>{{ $message }}</i></div>
  @enderror
</div>
