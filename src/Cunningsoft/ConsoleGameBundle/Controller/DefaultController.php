<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @Route("/")
 */
class DefaultController extends BaseController
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
        list($command, $subcommand) = $this->parseCommand($request->get('input'));

        try {
            $this->getRouter()->generate('cunningsoft_consolegame_command_' . $command);
        } catch (RouteNotFoundException $e) {
            return new Response('unknown command "' . $command . '"');
        }

        return $this->forward('ConsoleGameBundle:Command:' . $command, array('command' => $subcommand));
    }
}
