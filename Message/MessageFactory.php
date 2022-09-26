<?php declare(strict_types=1);

namespace Yireo\ExtensionChecker\Message;

use Magento\Framework\ObjectManagerInterface;

class MessageFactory
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;
    
    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(
        ObjectManagerInterface $objectManager
    ) {
        $this->objectManager = $objectManager;
    }
    
    /**
     * @param string $text
     * @param string $type
     * @return Message
     */
    public function create(string $text, string $type)
    {
        return $this->objectManager->create(Message::class, ['text' => $text, 'type' => $type]);
    }
    
    /**
     * @param string $text
     * @return Message
     */
    public function createNotice(string $text)
    {
        return $this->create($text, Message::TYPE_NOTICE);
    }
    
    /**
     * @param string $text
     * @return Message
     */
    public function createWarning(string $text)
    {
        return $this->create($text, Message::TYPE_WARNING);
    }
    
    /**
     * @param string $text
     * @return Message
     */
    public function createDebug(string $text)
    {
        return $this->create($text, Message::TYPE_DEBUG);
    }
}
