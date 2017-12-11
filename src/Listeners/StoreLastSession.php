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
use Illuminate\Support\Facades\Session;

/**
 * Class StoreLastSession.
 *
 * @author overtrue <i@overtrue.me>
 */
class StoreLastSession
{
    /**
     * Handle the event.
     *
     * @param object $event
     */
    public function handle($event)
    {
        $currentSessionId = Session::getId();
        $lastSessionField = config('last_session_field', 'last_session_id');

        if (config('session.last_session_storage', 'cache')) {
            Cache::forever($lastSessionField.'.'.$event->user->id, $currentSessionId);
        } else {
            $event->user->update([$lastSessionField => $currentSessionId]);
        }
    }
}
