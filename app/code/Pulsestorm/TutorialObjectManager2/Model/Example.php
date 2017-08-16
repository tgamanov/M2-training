<?php
namespace Pulsestorm\TutorialObjectManager2\Model;

class Example
{
    protected $messageObject;
	/*public function __construct() //old style
		$object = new Message; //
		$this->messageObject = $object;
	}*/

	public function __construct(Message $message) //same but with di
    {
       /* var_dump(get_class($message)); //gives us the name of the class which creating woth object manager
        exit;*/
        $this->messageObject = $message;
    }

    public function sendHelloAgainMessage()
    {
        return $this->messageObject->getMessage();    
    }
}