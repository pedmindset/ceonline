<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SiteNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('notification.' .$this->notification->service_id);
    }

    public function broadcastWith()
    {
        return [
            'notification' => [
                'id'              => $this->notification->getKey(),
                'title'            => $this->notification->title,
                'message'            => $this->notification->message,
                'url'            => $this->notification->url,
                'service_id'            => $this->notification->service_id,
                'created_at'      => $this->notification->created_at,
                'reload'          => $this->notification->reload,
            ],
        ];
    }
}
