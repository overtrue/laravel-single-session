<?php

/*
 * This file is part of the overtrue/laravel-single-session.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\LaravelSingleSession\Listeners;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Overtrue\LaravelSingleSession\Events\SessionDestroyed;

/**
 * Class ClearLastSession.
 *
 * @author overtrue <i@overtrue.me>
 */
class ClearLastSession
{
    /**
     * Handle the event.
     *
     * @param object $event
     */
    public function handle($event)
    {
        $lastSessionField = config('last_session_field', 'last_session_id');

        if (config('session.last_session_storage', 'cache')) {
            $previousSessionId = Cache::pull($lastSessionField.'.'.$event->user->id);
            Session::getHandler()->destroy($previousSessionId);
            Event::dispatch(new SessionDestroyed($event->user, $previousSessionId));
        } else {
            $event->user->update([$lastSessionField => null]);
        }
    }
}
