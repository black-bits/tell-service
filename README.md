# TellService

[![Latest Version on Packagist](https://img.shields.io/packagist/v/black-bits/tell-service.svg?style=flat-square)](https://packagist.org/packages/black-bits/tell-service)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/black-bits/tell-service/master.svg?style=flat-square)](https://travis-ci.org/black-bits/tell-service)
[![Total Downloads](https://img.shields.io/packagist/dt/black-bits/tell-service.svg?style=flat-square)](https://packagist.org/packages/black-bits/tell-service)

Send messages for remote tasks to another service

## How to use

After installing the package you can send a message to another service

```php
TellService::message(
    $service_receiving = 'remote-service-queue-name',
    $remote_event      = '\App\Events\TestEvent',
    $arguments         = 'This Is Awesome'
);
```