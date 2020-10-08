<?php

namespace App\Events;

use App\Notify;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $notify;

    public function __construct(Notify $notify)
    {
        $fecha          = Carbon::parse($notify->created_at)->format('l, d \d\e F \d\e\l Y \| g:i A');
        $myObj          = new \stdClass();
        $myObj->idUser  = encrypt_notify("trivia2020Notify", $notify->idUser);
        $myObj->mensaje = encrypt_notify("trivia2020Notify", $notify->mensaje);
        $myObj->email   = encrypt_notify("trivia2020Notify", $notify->email);
        $myObj->nombre  = encrypt_notify("trivia2020Notify", $notify->nombre);
        $myObj->fecha   = encrypt_notify("trivia2020Notify", $fecha);
        $myJSON         = json_encode($myObj);
        $this->notify   = $myJSON;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('example');
    }

    public function broadcastAs()
    {
        return ('example');
    }

}
