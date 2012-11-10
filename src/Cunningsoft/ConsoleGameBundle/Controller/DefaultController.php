<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

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
        list($controller, $params) = $this->parseCommand($request->get('input'));

        try {
            $this->getRouter()->generate('cunningsoft_consolegame_command_' . $controller);
        } catch (RouteNotFoundException $e) {
            return new Response('unknown command "' . $controller . '"');
        }
        return $this->forward('ConsoleGameBundle:Command:' . $controller, array('params' => $params));
    }

    private function parseCommand($command)
    {
        $splitCommand = explode(' ', $command);
        $controller = array_shift($splitCommand);
        $params = $splitCommand;

        return array($controller, $params);
    }

    /**
     * @return Router
     */
    private function getRouter()
    {
        return $this->get('router');
    }
}
