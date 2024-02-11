<?php

use function Livewire\Volt\{state,rules};
use App\Models\Product;

state([
        'name' => '',
        'stock' => '',
        'price' => ''
]);

rules([
    'name' => 'required',
    'stock' => 'required',
    'price' => 'required'
]);

$save = function(){
        $validated = $this->validate();
        $product = Product::create($validated);
        $this->reset();

        session()->flash('status', 'Product successfully added.');
        $this->redirect('/product');

}

?>

<x-layouts.app>

    @volt
        <div>
            <form wire:submit="save">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            <div>
                                @error('name')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input type="number" wire:model="stock" class="form-control">
                            <div>
                                @error('stock')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="number" wire:model="price" class="form-control">
                            <div>
                                @error('price')
                                <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endvolt

</x-layouts.app>
