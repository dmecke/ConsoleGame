<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/command")
 */
class CommandController extends Controller
{
    /**
     * @param array $params
     *
     * @return Response
     *
     * @Route("/help")
     */
    public function helpAction(array $params)
    {
        return new Response('this is the help action');
    }

}
