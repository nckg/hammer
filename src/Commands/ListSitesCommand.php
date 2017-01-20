<?php


namespace Nckg\Hammer\Commands;

use Mpociot\Blacksmith\Models\Site;
use Nckg\Hammer\Traits\UsesApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Webdevvie\Emoji\Emoji;

class ListSitesCommand extends Command
{
    use UsesApi;

    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('list:sites')
            ->addArgument('server_id', InputArgument::REQUIRED)
            ->setDescription('Returns a list of your sites.');
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
        $table->setHeaders(['ID', 'Name', 'Secure']);

        $this->api()
            ->getServer($input->getArgument('server_id'))
            ->getSites()
            ->each(function (Site $site) use ($table) {
                $table->addRow([
                    $site->id,
                    $site->name,
                    $site->secured ? Emoji::WHITE_HEAVY_CHECK_MARK : null,
                ]);
            });

        $table->render();
    }
}