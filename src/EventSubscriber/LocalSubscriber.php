<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class LocalSubscriber implements EventSubscriberInterface
{
    public function __construct(private string $defaultLocale = 'en')
    {
        
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        // Set the locale for the request
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return; // If there is no session, do nothing
        }
        if($locale = $request->query->get('_locale')) {
            $request->setLocale($locale);
        } else {
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return[
            KernelEvents::REQUEST => ['onKernelRequest', 20],
        ];
    }


}
