<?php

namespace App\Events;

use App\Models\Comment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('comment.' .$this->comment->service_id);
    }

    public function broadcastWith()
    {
        return [
            'comment' => [
                'id'              => $this->comment->getKey(),
                'message'            => $this->comment->message,
                'user'            => $this->comment->user,
                'service_id'            => $this->comment->service_id,
                'created_at'      => $this->comment->created_at,
                'church_id'          => $this->comment->church_id,
            ],
        ];
    }
}
