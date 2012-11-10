<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventoryController extends BaseController
{
    /**
     * @return Response
     *
     * @Route("/list")
     */
    public function listAction()
    {
        return new Response('list');
    }
}
