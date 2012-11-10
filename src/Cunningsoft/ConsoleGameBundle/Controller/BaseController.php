<?php

namespace Cunningsoft\ConsoleGameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class BaseController extends Controller
{
    /**
     * @param string $command
     *
     * @return array
     */
    protected function parseCommand($command)
    {
        $splitCommand = explode(' ', $command);
        $controller = array_shift($splitCommand);
        $subcommand = implode(' ', $splitCommand);

        return array($controller, $subcommand);
    }

    /**
     * @return Router
     */
    protected function getRouter()
    {
        return $this->get('router');
    }
}
