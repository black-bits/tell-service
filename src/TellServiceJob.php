<?php

namespace BlackBits\TellService;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TellServiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;


    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle()
    {
        $event = $this->message->getRemoteEvent();

        if ($event == 'TellServiceErrorEvent') {

            \TellService::getErrorHandler()->handle($this->message->getArguments());

        } else if (!class_exists($event)) {

            \TellService::message(
                $service_receiving = $this->message->getServiceSending(),
                $remote_event = 'TellServiceErrorEvent',
                $arguments = $this->message
            );

        } else {

            event(new $event($this->message->getArguments()));

        }
    }
}
