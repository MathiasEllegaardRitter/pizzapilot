<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DeliveryAddress;
use App\Models\Order;

class DeliveryForm extends Component
{
    
    public $email;
    public $street;
    public $name;

    public $city;
    public $phone;
    public $pincode;
    public $comment;
    public $order;
    public $customer;
    public $delivery;

    public function render()
    {
        if(auth()->check())
        {
            $user = auth()->user();     
            $this->customer = $user->customer;
        }
        return view('livewire.delivery-form');
    }

    public function submitForm()
    {
        if (auth()->check()) {
                $this->AuthGetDeliveryFromDatabase();
        } else{
            $this->GetDeliveryFromDatabase();
        }
        $this->setOrder($this->delivery);
    }

    private function AuthGetDeliveryFromDatabase()
    {   
        $existingDelivery = DeliveryAddress::where([
            'street' => $this->street,
            'city' => $this->city,
            'comment' => $this->comment,
            'postal_code' => $this->pincode,
            'customer_id' => $this->customer->id
        ])->first();
        if ($existingDelivery) {
            // Use the existing delivery address
            $this->delivery = $existingDelivery;
        } else {
            // Create a new delivery address
            $this->delivery = DeliveryAddress::create([
                'street' => $this->street,
                'city' => $this->city,
                'comment' => $this->comment,
                'postal_code' => $this->pincode,
                'customer_id' => $this->customer->id
            ]);
        }  
    }

    private function GetDeliveryFromDatabase()
    {   
        $existingDelivery = DeliveryAddress::where([
            'street' => $this->street,
            'city' => $this->city,
            'comment' => $this->comment,
            'postal_code' => $this->pincode,
        ])->first();
        if ($existingDelivery) {
            // Use the existing delivery address
            $this->delivery = $existingDelivery;
        } else {
            // Create a new delivery address
            $this->delivery = DeliveryAddress::create([
                'street' => $this->street,
                'city' => $this->city,
                'comment' => $this->comment,
                'postal_code' => $this->pincode,
            ]);
        }  
    }

    private function setOrder($delivery)
    {
        $orderId = session('orderid');

        $order = Order::find($orderId);

        if(auth()->check() && $order)
        {
            $order->customer_id = $this->customer->id;
        }
        
        if ($order) {
            $order->delivery_addresse_id = $delivery->id;
            $order->save();
        } else {
            // Give an error to user;
        }
    }

};


