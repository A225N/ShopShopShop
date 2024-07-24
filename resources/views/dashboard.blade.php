<x-layout>
    <x-slot:title>Selamat Datang!</x-slot:title>

    <div class="container">
        <div class="row mb-4">
            <div class="col mb-5">
                <div>
                    <div>
                        <h1 class="d-flex justify-content-center">Sebanyak</h1>
                        <h1 class="fw-bold d-flex justify-content-center"> {{ number_format($productsCount) }} Produk</h1>
                        <h1 class="d-flex justify-content-center"> Sedang Dijual!</h1>
                    </div>
                </div>
            </div>

    <div class="card horizontal-scroll">
        <div class="container2 d-flex justify-content-between">
            @foreach ($productsImg as $product)
            <a href="{{ route('orders.create.detail', ['product' => $product->id]) }}">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                    class="w-thumbnail img-thumbnail">
            </a>
            @endforeach
        </div>
    </div>
</x-layout>
