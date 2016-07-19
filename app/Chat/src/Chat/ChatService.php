<?php
namespace diwip\Chat\Chat;

use diwip\Base\ServiceManager\Contracts\ServiceProvider;
use diwip\Base\ServiceManager\Contracts\ServiceManager;
use diwip\Base\Db\PdoAdapter;

class ChatService implements ServiceProvider
{
    /**
     * @var ChatMapper
     */
    protected $chatMapper;
    
    public function __construct(ChatMapper $chatMapper)
    {
        $this->chatMapper = $chatMapper;
    }
    
    public function send($userId, $message)
    {
        return $this->chatMapper->send($userId, $message);
    }
    
    public function receiveFromId($id)
    {
        return $this->chatMapper->receiveFromId($id);
    }
    
    public static function create(ServiceManager $sm)
    {
        $conf = $sm->getAppConfiguration()->dbs->chatDb;
        $pdoAdapter = new PdoAdapter($conf->dsn, $conf->username, $conf->password);
        $chatMapper = new ChatMapper($pdoAdapter);
        return new self($chatMapper);
    }
}

