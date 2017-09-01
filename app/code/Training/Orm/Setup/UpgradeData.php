<?php

namespace Training\Orm\Setup;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav;
use Magento\Eav\Model\Attribute;
use Magento\Eav\Model\Entity;
use Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Table as TableSourceModel;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Paypal\Helper\Backend;
use Magento\TestFramework\Event\Magento;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var EavSetup
     * @var CategorySetupFactory
     * @var DbVersion
     */

    private $eavSetup;
    private $categorySetupFactory;

    public function __construct(EavSetup $eavSetup, CategorySetupFactory $categorySetupFactory)
    {
        $this->eavSetup = $eavSetup;
        $this->categorySetupFactory = $categorySetupFactory;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare('0.1.0', $context->getVersion(), '>=')) {
            $this->eavSetup->addAttribute(Product::ENTITY, 'wow_level', [
                'label' => 'How cool is it',
                'type' => 'varchar',
                'input' => 'multiselect',
                'source' => TableSourceModel::class,
                'backend' => ArrayBackend::class,
                'required' => false,
                'user_defined' => true,
                'global' => ScopedAttributeInterface::SCOPE_WEBSITE,
                'visible_on_front' => true,
                'group' => 'Product Details',
                'option' => [
                    'values' => [
                        100 => 'Nothing',
                        200 => 'So so',
                        300 => 'Let it be',
                        400 => 'Handsome',
                        500 => 'Where did you buy it?',
                        600 => 'Give it to me now!!!',
                    ]
                ],
            ]);
        }

        $dbVersion = $context->getVersion();

        if (version_compare($dbVersion, '0.1.2', '<')) {
            /** @var CategorySetup $catalogSetup */
            $categorySetupFactory = $this->categorySetupFactory->create(['setup' => $setup]);
            $categorySetupFactory->updateAttribute(
                Product::ENTITY,
                'wow_level',
                [
                    'frontend_model' =>
                        \Training\Orm\Entity\Attribute\Frontend\HtmlList::class,
                    'is_html_allowed_on_front' => 1,
                ]
            );
        }
    }
}