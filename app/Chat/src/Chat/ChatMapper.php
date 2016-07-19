<?php
namespace diwip\Chat\Chat;

use diwip\Base\Db\PdoAdapter;

class ChatMapper
{
    /**
     * @var PdoAdapter
     */
    protected $adapter;
    
    /**
     * @param PdoAdapter $adapter
     */
    public function __construct(PdoAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
    
    public function send($userId, $message)
    {
        $sql = "INSERT INTO `message` (user_id, message) VALUES (:user_id, :message)";
        return $this->adapter->insert($sql, [
            ':user_id'  => $userId,
            ':message'  => $message
        ]);
    }
    
    public function receiveFromId($id)
    {
        $sql = "SELECT * FROM `message` WHERE id > :id";
        return $this->adapter->selectAll($sql, [
            ':id' => $id
        ]);
    }
    
}

