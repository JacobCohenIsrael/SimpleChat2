<?php
namespace diwip\Chat\Chat;

use diwip\Base\Http\Response;
use diwip\Base\Http\Controller\Controller;

class ChatController extends Controller
{
    public function send(ChatService $chatService) 
    {
        $userId = $this->request()->post->userId;
        $message = $this->request()->post->msg;
        return (new Response(['success' => $chatService->send($userId, $message)]))->setJson();
    }
    
    public function receive(ChatService $chatService)
    {
        $lastSeenId = $this->request()->post->lastSeenId;
        $messages = $chatService->receiveFromId($lastSeenId);
        $newlastSeenId = end($messages)['id'];
        return (new Response([
            'messages' => $messages,
            'newLastSeenId' => $newlastSeenId
        ]))->setJson();
    }
}
 