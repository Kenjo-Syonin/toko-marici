@extends('layouts.template')

@section('content')
<form action="{{ route('item.update', $item['id']) }}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')

    @if ($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Barang :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $item['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Jenis Barang :</label>
        <div class="col-sm-10">
            <select class="form-select" id="type" name="type">
                <option selected disabled hidden>Pilih</option>
                <option value="sembako" {{ $item['type'] == 'sembako' ? 'selected' : '' }}>sembako</option>
                <option value="snack" {{ $item['type'] == 'snack' ? 'selected' : '' }}>snack</option>
                <option value="lainnya" {{ $item['type'] == 'lainnya' ? 'selected' : '' }}>lainnya</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Barang :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="{{ $item['price'] }}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection
