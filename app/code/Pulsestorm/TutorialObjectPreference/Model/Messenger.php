<?php
namespace Pulsestorm\TutorialObjectPreference\Model;
class Messenger
{
    protected $message_holder;
    public function __construct(MessageHolderInterface $mhi)
    {
        /*var_dump(
            get_class($mhi)
        );
        exit;*/
        $this->message_holder = $mhi;
    }
    
    public function getMessage()
    {
        return $this->message_holder->getHelloMessage();
    }
}