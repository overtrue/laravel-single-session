<?php

/*
 * This file is part of the overtrue/laravel-single-session.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\LaravelSingleSession\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SessionDestroyed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $sessionId;

    /**
     * Create a new event instance.
     */
    public function __construct($user, $sessionId)
    {
        $this->user = $user;
        $this->sessionId = $sessionId;
    }
}
