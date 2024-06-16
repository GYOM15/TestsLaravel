<?php

namespace App\Events;


use App\Models\Property;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ContactRequestEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     * Dans le cas de notre formulaire de contact, nous aurons besoin que de deux informations, 
     * La propriété en question, et les informations du contact
     */
    public function __construct(public Property $property, public array $data)
    {
        //
    }


}
