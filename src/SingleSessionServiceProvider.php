<?php

/*
 * This file is part of the overtrue/laravel-single-session.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\LaravelSingleSession;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Overtrue\LaravelSingleSession\Listeners\ClearLastSession;
use Overtrue\LaravelSingleSession\Listeners\StoreLastSession;

/**
 * Class SingleSessionServiceProvider.
 *
 * @author overtrue <i@overtrue.me>
 */
class SingleSessionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::listen(\Illuminate\Auth\Events\Login::class, ClearLastSession::class);
        Event::listen(\Illuminate\Auth\Events\Authenticated::class, StoreLastSession::class);
    }

    public function register()
    {
        // do nothing
    }
}
