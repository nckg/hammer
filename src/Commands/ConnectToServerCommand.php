<?php


namespace Nckg\Hammer\Commands;

use Mpociot\Blacksmith\Models\Server;
use Nckg\Hammer\Traits\UsesApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConnectToServerCommand extends Command
{
    use UsesApi;

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('servers:connect')
            ->addArgument('name', InputArgument::REQUIRED, 'The Name of the Server you want to connect to.')
            ->setDescription('Try to connect to a given Forge server.');
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return null|int null or 0 if everything went fine, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        throw new CommandNotFoundException("This command is not yet implemented");
    }
}