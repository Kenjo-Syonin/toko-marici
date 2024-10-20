@extends('layouts.template')

@section('content')
    <form action="{{ route('item.store') }}" method="POST" class="card p-5">
        @csrf

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3 row">
            <label for="name" class="col-sm2 col-form-label">Nama Barang : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm2 col-form-label">Jenis Barang :</label>
            <div class="col-sm-10">
                <select name="type" id="type" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    <option value="sembako">sembako</option>
                    <option value="snack">snack</option>
                    <option value="lainnya">lainnya</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm2 col-form-label">Harga : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="stock" class="col-sm2 col-form-label">Stok : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="stock" name="stock">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Barang</button>
    </form>
@endsection
