<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\PropertyContactMail;
use App\Events\ContactRequestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactListener
{
    /**
     * Create the event listener.
     * Dans notre listener on injecte le Mailer qui s'occupera de l'envoi de mail
     */
    public function __construct(private Mailer $mailer)
    {
    }

    /**
     * Handle the event.
     * Dans cette fonction on implémente finalement l'envoie d'email
     */
    public function handle(ContactRequestEvent $event): void
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
}
