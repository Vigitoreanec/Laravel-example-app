<h2>kjhdkj</h2>
<form method="POST" action="{{ route('admin.categories.store') }} ">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">Текст Категории</label>

        <div class="col-md-6">
            <textarea class="form-control @error('name') is-invalid @enderror" name="name">{{old('name')}}</textarea>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Добавить
            </button>
        </div>
    </div>
</form>