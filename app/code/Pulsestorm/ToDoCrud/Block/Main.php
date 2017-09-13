<?php
namespace Pulsestorm\ToDoCrud\Block;
class Main extends \Magento\Framework\View\Element\Template
{
    protected $toDoFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Pulsestorm\ToDoCrud\Model\TodoItemFactory $toDoFactory
    )
    {
        $this->toDoFactory = $toDoFactory;
        parent::__construct($context);
    }

    function _prepareLayout()
    {
//        $todo = $this->toDoFactory->create();
//        $todo->setData('title','Finish my Magento article')
//            ->save();
//        var_dump('Done');
//        exit;

        $todo = $this->toDoFactory->create();

        $todo = $todo->load(1);
        var_dump($todo->getData());

        var_dump($todo->getTitle());

        var_dump($todo->getData('title'));
        exit;
    }
}
