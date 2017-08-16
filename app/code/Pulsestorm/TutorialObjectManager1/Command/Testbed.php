<?php
namespace Pulsestorm\TutorialObjectManager1\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Testbed extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('ps:tutorial-object-manager-1');
        $this->setDescription('A cli playground for testing commands');
        parent::configure();
    }

   /* protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello World!");
    }*/

   /* protected function execute(InputInterface $input, OutputInterface $output) //old style
    {
        $object = new \Pulsestorm\TutorialObjectManager1\Model\Example;
        $message = $object->getHelloMessage();
        $output->writeln(
            $message
        );
    }*/
    /*
        protected function execute(InputInterface $input, OutputInterface $output) //manual using of the object manager
        {
            $manager = $this->getObjectManager();
            $object  = $manager->create('Pulsestorm\TutorialObjectManager1\Model\Example');
            $message = $object->getHelloMessage();
            $output->writeln(
                $message
            );
        }*/

    protected function execute(InputInterface $input, OutputInterface $output) //singleton
    {
        $manager = $this->getObjectManager();
//        $object  = $manager->create('Pulsestorm\TutorialObjectManager1\Model\Example');
        $object  = $manager->get('Pulsestorm\TutorialObjectManager1\Model\Example'); //get vs create - use created or create another one
        $object->message = 'Hello PHP!';
        $output->writeln(
            $object->getHelloMessage()
        );

//        $object  = $manager->create('Pulsestorm\TutorialObjectManager1\Model\Example');
        $object  = $manager->get('Pulsestorm\TutorialObjectManager1\Model\Example');
        $output->writeln(
            $object->getHelloMessage()
        );
    }
}