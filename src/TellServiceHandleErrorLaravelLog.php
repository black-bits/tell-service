<?php

namespace BlackBits\TellService;


class TellServiceHandleErrorLaravelLog implements TellServiceHandleErrorInterface
{
    public function handle(Message $message)
    {
        \Log::error('TellServiceJob Failed on Service ' . $message->getServiceReceiving() . ' with remote_event ' . $message->getRemoteEvent());
    }
}