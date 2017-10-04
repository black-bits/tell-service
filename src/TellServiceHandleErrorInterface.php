<?php

namespace BlackBits\TellService;


interface TellServiceHandleErrorInterface
{
    public function handle(Message $message);
}