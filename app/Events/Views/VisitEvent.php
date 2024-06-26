<?php

namespace App\Events\Views;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VisitEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var $model
     */
    private  $model ;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        dd(client_ip());
        $this->model = $model;
    }

    public function getModel() :Model
    {
        return $this->model ;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
