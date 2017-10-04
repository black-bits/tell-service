<?php

namespace BlackBits\TellService;


class TellService
{
    protected $message;
    protected $error_handler;

    public function __construct(TellServiceHandleErrorInterface $error_handler)
    {
        $this->error_handler = $error_handler;
    }

    public function message($service_receiving, $remote_event, $arguments = null)
    {
        $service_sending = config('queue.connections.sqs.queue');

        $this->message = new Message(
            $service_sending, $service_receiving,
            $remote_event, $arguments
        );

        dispatch(new TellServiceJob($this->message))
            ->onQueue($this->message->getServiceReceiving());
    }

    public function getErrorHandler()
    {
        return $this->error_handler;
    }


}
