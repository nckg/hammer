<?php


namespace Nckg\Hammer\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegisterCommand extends Command
{
    /**
     * Configures the current command.
     */
    public function configure()
    {
        $this->setName('register')
            ->addArgument('email', InputArgument::REQUIRED)
            ->addArgument('password', InputArgument::REQUIRED)
            ->setDescription('Save your Forge credentials.');
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
        $stub = file_get_contents(__DIR__ . "/../stubs/env.stub");
        $stub = str_replace(
            ['{USERNAME}', '{PASSWORD}'],
            [$input->getArgument('email'), $input->getArgument('password')],
            $stub
        );

        file_put_contents(__DIR__ . "/../../.env", $stub);

        $output->writeln('<info>Saved!</info>');
    }
}