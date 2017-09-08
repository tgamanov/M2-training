<?php

namespace Training\ComputerGames\Model;

/**
 * @method \Training\ComputerGames\Model\ResourceModel\Game getResource()
 * @method \Training\ComputerGames\Model\ResourceModel\Game\Collection getCollection()
 */
class Game extends \Magento\Framework\Model\AbstractModel implements \Training\ComputerGames\Api\Data\GameInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */

    const CACHE_TAG = 'training_computergames_game';
    protected $_cacheTag = 'training_computergames_game';
    protected $_eventPrefix = 'training_computergames_game';

    protected function _construct()
    {
        $this->_init('Training\ComputerGames\Model\ResourceModel\Game');
    }

    public function getCustomAttributesCodes()
    {
        return array('game_id', 'name', 'type', 'trial_period', 'release_date');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}