<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @Route("/command")
 */
class CommandController extends BaseController
{
    /**
     * @param string $command
     *
     * @return Response
     *
     * @Route("/command")
     */
    public function commandAction($command)
    {
        list($command, $subcommand) = $this->parseCommand($command);

        try {
            $this->getRouter()->generate('cunningsoft_consolegame_command_' . $command);
        } catch (RouteNotFoundException $e) {
            return new Response('unknown command "' . $command . '"');
        }

        return $this->forward('ConsoleGameBundle:Command:' . $command, array('command' => $subcommand));
    }

    /**
     * @param string $command
     *
     * @return Response
     *
     * @Route("/inventory")
     */
    public function inventoryAction($command)
    {
        list($command, $subcommand) = $this->parseCommand($command);

        try {
            $this->getRouter()->generate('cunningsoft_consolegame_inventory_' . $command);
        } catch (RouteNotFoundException $e) {
            return new Response('unknown command "' . $command . '"');
        }

        return $this->forward('ConsoleGameBundle:Inventory:' . $command, array('command' => $subcommand));
    }

    /**
     * @return Response
     *
     * @Route("/list")
     */
    public function listAction()
    {
        $response = array();
        $response[] = 'available commands:';
        $response[] = 'command list';
        $response[] = 'inventory list';

        return new Response(json_encode($response));
    }
}
