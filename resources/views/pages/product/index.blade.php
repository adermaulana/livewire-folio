<?php

use function Livewire\Volt\{computed};
use App\Models\Product;

$product = computed(function(){
    return Product::latest()->get();
});

$delete = function(Product $product){
    $product->delete();
    session()->flash('status', 'Product successfully deleted.');
}
?>

<x-layouts.app>

    @volt
        <div>
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <a href="product/create" wire:navigate class="btn btn-success">Create Product</a>

            <table class="table mt-3 mb-5">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->product as $data)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->stock }}</td>
                    <td> {{ $data->price }} </td>
                    <td>
                        <button wire:click="delete({{ $data->id }})" class="btn btn-danger">Delete</button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    @endvolt

</x-layouts.app>
