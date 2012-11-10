<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @return array
     *
     * @Route("")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @param Request $request
     *
     * @return array
     *
     * @Route("command", name="command")
     */
    public function commandAction(Request $request)
    {
        return new Response($request->get('input'));
    }
}
