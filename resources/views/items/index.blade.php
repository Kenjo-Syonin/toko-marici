@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }} </div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($items) < 1)
                <tr>
                    <td colspan="6" class="text-center">Data Barang Kosong</td>
                </tr>
            @else
                @php $no=1; @endphp
                @foreach ($items as $index => $barang)
                    <tr>
                        <td>
                            {{ ($items->currentPage()-1) * ($items->perPage()) +( $index+1) }}
                        </td>
                        <td>{{ $barang->name }}</td>
                        <td>{{ $barang->type }}</td>
                        <td>{{ $barang->price }}</td>
                        <td>{{ $barang->stock }}</td>
                        <td class="d-felx justify-content-center">
                            <a href="{{ route('item.edit', $barang->id) }}" class="btn btn-primary">Edit</a> <br>
                            <form action="{{ route('item.destroy', $barang['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <!-- links() : memunculkan button pagination -->
        {{ $items->links() }}
    </div>
@endsection
