<?php

namespace Training\Repository\Controller\Repository;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable as ConfigurableProduct;

class Product extends Action
{
    /**
     * @var ProductRepositoryInterface
     */

    private $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */

    private $searchCriteriaBuilder;

    /**
     * Product constructor.
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     */

    private $filterBuilder;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder)
    {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    public function execute()
    {
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        $products = $this->getProductsFromRepository();

        foreach ($products as $product) {
            $this->outputProduct($product);
        }
    }

    /**
     * @return ProductRepository[]
     */

    private function getProductsFromRepository()
    {
        $this->setProductTypeFilter();
        $criteria = $this->searchCriteriaBuilder->create();
        $products = $this->productRepository->getList($criteria);
        return $products->getItems();
    }

    private function setProductTypeFilter()
    {
        $configProductFilter = $this->filterBuilder
            ->setField('type_id')
            ->setValue(ConfigurableProduct::TYPE_CODE)
            ->setConditionType('eq')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$configProductFilter]);
    }

    private function setProductNameFilter()
    {
        $nameFilter = $this->filterBuilder
            ->setField('name')
            ->setValue('M%')
            ->setConditionType('like')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$nameFilter]);
    }

    private function setProductOrder()
    {
        $sortOrder = $this->sortOrdrBuilder
            ->setField('entity_id')
            ->setDirection(SearchCriteriaInterface::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
    }

    private function setProductPaging()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('name')
            ->setDirection(SearchCriteriaInterface::SORT_ASC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
        $this->searchCriteriaBuilder->setPageSize(6);
        $this->searchCriteriaBuilder->setCurrentPage(1);
    }

    private function outputProduct(ProductInterface $product)
    {
        $this->getResponse()->appendBody(sprintf(
            "%s - %s (%d)\n",
            $product->getName(),
            $product->getSku(),
            $product->getId()

        ));
    }
}