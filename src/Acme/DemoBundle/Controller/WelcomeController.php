<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Demo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /** * /
        $yaml = 'test: { key: "value", date: !!php/object:O:8:"DateTime":3:{s:4:"date";s:19:"2012-12-25 00:00:00";s:13:"timezone_type";i:3;s:8:"timezone";s:13:"Europe/London";} }';
        Yaml::parse($yaml);
        /**/

        $this->get('doctrine.demo2');

        /** * /
        $demo = new Demo();
        $demo->firstName = '123456789   ';

        $validator = $this->get('validator');
        $errors = $validator->validate($demo);

        if (count($errors) > 0) {
            return new Response(print_r($errors, true));
        } else {
            return new Response('The author is valid! Yes!');
        }
        /**/

        /**  * /
        for ($i = 1; $i < 50; $i++) {
            $this->getDoctrine()->getManager()->find('AcmeDemoBundle:Match', $i);
            $team = $this->getDoctrine()->getManager()->find('AcmeDemoBundle:Team', $i);
            $this->getDoctrine()->getManager()->getRepository('AcmeDemoBundle:Match')->getMatchesBetweenDates();

            if ($team == null) {
                continue;
            }

            $this->getDoctrine()->getManager()->getRepository('AcmeDemoBundle:Match')->searchMatchesByTeamName($team->getName());
        }
        /**/


        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
        //return $this->render('AcmeDemoBundle:Welcome:demo.html.twig');

        //return new Response('demo');
    }
}
