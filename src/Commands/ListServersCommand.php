<?php


namespace Nckg\Hammer\Commands;

use Mpociot\Blacksmith\Models\Server;
use Nckg\Hammer\Traits\UsesApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListServersCommand extends Command
{
    use UsesApi;

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('list:servers')
            ->setDescription('Returns a list of your servers.');
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
        $table = new Table($output);
        $table->setHeaders(['ID', 'Name', 'IP', 'Provider', 'Installed', 'Status']);

        $this->api()->getActiveServers()->each(function (Server $server) use ($table) {
            $table->addRow([
                $server->id,
                $server->name,
                $server->ip_address,
                $server->provider,
                (bool) $server->is_ready,
                $server->displayable_provision,
            ]);
        });

        $table->render();
    }
}