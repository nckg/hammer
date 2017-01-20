<?php


namespace Nckg\Hammer\Commands;

use Mpociot\Blacksmith\Models\Site;
use Nckg\Hammer\Traits\UsesApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SiteDeployCommand extends Command
{
    use UsesApi;

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('site:deploy')
            ->addArgument('site_id', InputArgument::REQUIRED)
            ->setDescription('Deploys a site.');
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
        $site = $this->api()->getSite($input->getArgument('site_id'));

        $site->deploy();
    }
}