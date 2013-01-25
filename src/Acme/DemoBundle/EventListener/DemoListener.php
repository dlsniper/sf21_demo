<?php

namespace Acme\DemoBundle\EventListener;

use Doctrine\Common\EventSubscriber;

class DemoListener implements EventSubscriber
{
    public function __construct()
    {
        echo 'asdasd';
    }

    public function getSubscribedEvents()
    {
        return array('postPersist');
    }

}
