<?php

namespace Portal\Bundle\GithubBundle\Command;

use Portal\Bundle\GithubBundle\Entity\GistManager;
use Portal\Component\Github\GithubApi;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GithubFetchCommand.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GithubFetchCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('portal:github-fetch');
        $this->setDescription('Fetch github data to populate the DB.');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer()->get('kernel')->getContainer();

        if (!$container->has('github_api')) {
            throw new \RuntimeException('You must configure github api to use this command.');
        }

        /** @var GithubApi $githubClient */
        $githubClient = $container->get('github_api');

        // Gists
        $output->write('<info>Trying to fetch user\'s gists...</info>');
        /* @var GistManager $gistManager */
        $container->get('portal.github.manager.gist')->addGists($githubClient->getGists());
        $output->writeln(' done!');
    }
}
