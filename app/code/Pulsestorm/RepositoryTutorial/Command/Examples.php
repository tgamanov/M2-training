<?php

namespace Pulsestorm\RepositoryTutorial\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\App\State;

class Examples extends Command
{
    protected function configure()
    {
        $this->setName("ps:examples");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected $objectManager;

    public function __construct(ObjectManagerInterface $objectManager, State $appState, $name = null)
    {
        $this->objectManager = $objectManager;
        $appState->setAreaCode('frontend');
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $output->writeln("Hello World");

       /* $repo = $this->objectManager->get('Magento\Catalog\Model\ProductRepository');
        $page = $repo->getById(2);
//        echo get_class($page),"\n";
        echo $page->getTitle(), "\n";
        $page->setTitle($page->getTitle() . ', Edited by code!');
        $repo->save($page);*/

        /* $repo = $this->objectManager->get('Magento\Cms\Model\PageRepository');
         $page = $repo->getById(2);

         echo $page->getTitle(),"\n";*/

        /*$repo = $this->objectManager->get('Magento\Cms\Model\PageRepository');
        $page = $repo->getById(2);
        $page->setId(null);
        $page->setTitle('My Duplicated Page');
        $repo->save($page);
        echo $page->getId(),"\n";*/

    /*    //create our filter
        $filter_1 = $this->objectManager
            ->create('Magento\Framework\Api\FilterBuilder')
            ->setField('sku')
            ->setConditionType('like')
            ->setValue('WSH11-28%Red')
            ->create();

        $filter_2 = $this->objectManager
            ->create('Magento\Framework\Api\FilterBuilder')
            ->setField('sku')
            ->setConditionType('like')
            ->setValue('WSH11-28%Blue')
            ->create();

//add our filter(s) to a group
        $filter_group = $this->objectManager
            ->create('Magento\Framework\Api\Search\FilterGroupBuilder')
            ->addFilter($filter_1)
            ->addFilter($filter_2)
            ->create();
// $filter_group->setData('filters', [$filter]);

//add the group(s) to the search criteria object
        $search_criteria = $this->objectManager
            ->create('Magento\Framework\Api\SearchCriteriaBuilder')
            ->setFilterGroups([$filter_group])
            ->create();*/

       /* //create our filter
        $filter_1 = $this->objectManager
            ->create('Magento\Framework\Api\FilterBuilder')
            ->setField('sku')
            ->setConditionType('like')
            ->setValue('WSH11-28%Red')
            ->create();

        $filter_2 = $this->objectManager
            ->create('Magento\Framework\Api\FilterBuilder')
            ->setField('sku')
            ->setConditionType('like')
            ->setValue('WSH11-28%Blue')
            ->create();

//add our filter(s) to a group
        $filter_group_1 = $this->objectManager
            ->create('Magento\Framework\Api\Search\FilterGroupBuilder')
            ->addFilter($filter_1)
            ->create();

        $filter_group_2 = $this->objectManager
            ->create('Magento\Framework\Api\Search\FilterGroupBuilder')
            ->addFilter($filter_2)
            ->create();
// $filter_group->setData('filters', [$filter]);

//add the group(s) to the search criteria object
        $search_criteria = $this->objectManager
            ->create('Magento\Framework\Api\SearchCriteriaBuilder')
            ->setFilterGroups([$filter_group_1, $filter_group_2])
            ->create();*/

        $search_criteria = $this->objectManager
            ->create('Magento\Framework\Api\SearchCriteriaBuilder')
            ->addFilter('sku','WSH11-28%Blue', 'like')
//->addFilter('sku','WSH11-28%Blue', 'like') //additional addFilters will
            //add another group
            ->create();

        //query the repository for the object(s)
        $repo = $this->objectManager->get('Magento\Catalog\Model\ProductRepository');
        $result = $repo->getList($search_criteria);
        $products = $result->getItems();
        foreach($products as $product)
        {
            echo $product->getSku(),"\n";
        }
    }
} 