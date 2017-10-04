<?php

namespace BlackBits\TellService;


class Message
{
    protected $service_sending, $service_receiving;
    protected $remote_event, $arguments;

    public function __construct($service_sending, $service_receiving, $remote_event, $arguments)
    {
        $this->service_sending   = $service_sending;
        $this->service_receiving = $service_receiving;

        $this->remote_event = $remote_event;
        $this->arguments    = $arguments;
    }

    public function getServiceSending()
    {
        return $this->service_sending;
    }

    public function getServiceReceiving()
    {
        return $this->service_receiving;
    }

    public function getRemoteEvent()
    {
        return $this->remote_event;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

}