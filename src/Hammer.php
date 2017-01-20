<?php

namespace Nckg\Hammer;

use Nckg\Hammer\Commands\ConnectToServerCommand;
use Nckg\Hammer\Commands\ListServersCommand;
use Nckg\Hammer\Commands\ListSitesCommand;
use Nckg\Hammer\Commands\RegisterCommand;
use Nckg\Hammer\Commands\SiteDeployCommand;
use Symfony\Component\Console\Application;

class Hammer extends Application
{
    const VERSION  = '0.1.0';

    /**
     * Hammer constructor.
     */
    public function __construct()
    {
        parent::__construct('hammer', self::VERSION);

        $this->add(new RegisterCommand());
        $this->add(new ListServersCommand());
        $this->add(new ListSitesCommand());
        $this->add(new ConnectToServerCommand());
        $this->add(new SiteDeployCommand());

    }

}