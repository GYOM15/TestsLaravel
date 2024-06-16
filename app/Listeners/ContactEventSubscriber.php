<?php 

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\PropertyContactMail;
use Illuminate\Events\Dispatcher;
use App\Events\ContactRequestEvent;

class  ContactEventSubscriber 
{       
    /**
     * __construct
     *On utilise le constructeur vu qu'on aura besoin du mailer un partout sinon on aurait
     * utiliser la façade
     */
    public function __construct(private Mailer $mailer){

    }
    
    /**
     * sendEmailForContact
     * On implémente la fonction qui permettra d'envoyer le mail apès avoir déclencher l'évènement
     * C'est en quelque sorte la même logique que le listener
     * 
     * 
     */
    public function sendEmailForContact(ContactRequestEvent $event){
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
    
    /**
     * subscribe
     *Cette fonction permet d'écouter l'évènement en question et ensuite lui dire d'utiliser
     *ce subscriber avec la méthode d'envoie de mail que nous avons implémenté spécifiquement.*Si nous avions une autre méthode pour un autre évènement nous le lui aurions indiqué
     */
    public function subscribe(Dispatcher $dispatcher) : array
    {
        return [
        ContactRequestEvent::class => 'sendEmailForContact'
        ];
    }
}
