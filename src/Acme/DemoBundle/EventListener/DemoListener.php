<?php

namespace Acme\DemoBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class DemoListener implements EventSubscriber
{

    protected $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function getSubscribedEvents()
    {
        return array(Events::postLoad);
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        echo 'asdasd';
    }

}
