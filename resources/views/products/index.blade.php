@extends('master')

@section('content_master')

    <h1>List Product</h1>

    <a href="{{ route('products.create') }}">Tambah Product</a>
    
    <div class="pb-8">
        @if($errors->any())
            <div class="bg-red-500 text-white font-bold rounded-t py-2 px-4">
                Something went wrong...
            </div>
            <ul class="border border-t-0 border-red-400 rounded-b px-4 py-3 text-red-700">
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    @forelse ($products as $product)
        <ul>
            <li>
                <p>{{ $product->nama }}</p>
            </li>
            <li>
                <p>{{ $product->harga }}</p>
            </li>
            <li>
                <p>{{ $product->deskripsi }}</p>
            </li>
            <li>
                <img src="{{ asset($product->foto_url) }}" alt="">
            </li>
            <li>
                <a href="{{ route('products.show', $product->id) }}">Details</a>
                <a href="{{ route('products.destroy', $product->id) }}">
                    Delete
                </a>
            </li>
        </ul>
    @empty
        <h1>Product Sedang Kosong</h1>
    @endforelse

@endsection