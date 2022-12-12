@extends('master')

@section('content_master')

<a href="{{ route('products.index') }}">Kembali</a>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="mb-5">
        <label for="nama">Nama</label> <br>
        <input type="text" name="nama" placeholder="Nama..."
        value="{{ $product->nama }}">
    </div> <br>

    <div class="mb-5">
        <label for="harga">Harga</label> <br>
        <input type="number" name="harga" placeholder="Harga..."
        value="{{ $product->harga }}">
    </div> <br>

    <div class="mb-5">
        <label for="deskripsi">Deskripsi</label> <br>
        <textarea name="deskripsi" id="" cols="30" rows="5">{{ $product->deskripsi }}</textarea>
    </div> <br>

    <div class="mb-5">
        <label for="foto">Foto</label> <br>
        <input type="file" name="foto" placeholder="Foto...">
    </div> <br>

    <button type="submit">
        Update Product
    </button>

</form>

@endsection