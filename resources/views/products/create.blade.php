@extends('layouts.app')

@section('content')
    <h2>Tambah Produk</h2>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="stock">Stok:</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan Produk</button>
    </form>
@endsection