<?php

namespace Training\ComputerGames\Model\ResourceModel;

class Game extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('training_computer_game', 'game_id');
    }

}