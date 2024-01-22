<?php

use App\Models\Product;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use Filament\Actions\DeleteAction;
use function Pest\Livewire\livewire;

it('can render ListProduct page', function () 
{    
    livewire(ListProducts::class)->assertSuccessful();
});

it('can create product', function () 
{    
    $newData = Product::factory()->make();     
    livewire(CreateProduct::class)        
    ->fillForm([              
        'name' => $newData->name,
        'description' => $newData->description,
        'instructions' => $newData->instructions,
        'price' => $newData->price,
        ])        
        ->call('create')        
        ->assertHasNoFormErrors();     
        $this->assertDatabaseHas(Product::class, [        
            'name' => $newData->name,        
            'description' => $newData->description,   
            'instructions' => $newData->instructions,            
            'price' => $newData->price,    
            
        ]);
    }
);

it('can edit Product', function () {
    $product = Product::factory()->create();
    $newData = Product::factory()->make();
    $number = 30.00;
    $newData->price = (float)$number;

    livewire(EditProduct::class, [
        'record' => $product->getRouteKey(),
    ])
        ->fillForm([              
        'name' => $newData->name,
        'description' => $newData->description,
        'instructions' => $newData->instructions,
        'price' => $newData->price,
        'category_id' => $newData->category->id,
        ]) 
        ->call('save')
        ->assertHasNoFormErrors();


    expect($product->refresh())
        ->name->toBe($newData->name)
        ->description->toBe($newData->description) 
        ->instructions->toBe($newData->instructions)         
        ->price->toBe($newData->price)
        ->category->id->toBe($newData->category->id);
});


it('can delete', function () {
    $product = Product::factory()->create();
 
    livewire(EditProduct::class, [
        'record' => $product->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);
 
    $this->assertModelMissing($product);
});


// Commando to run test: ./vendor/bin/pest tests/Feature/ProductTest.php