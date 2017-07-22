<?php

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\MeteorPayment\API;

use BrianFaust\Http\HttpResponse;

class Recurring extends AbstractAPI
{
    public function initialize(): HttpResponse
    {
        return $this->setRecurringType('INITIAL')->client->post('v1/payments', $this->parameters);
    }

    public function repeat(int $registrationId): HttpResponse
    {
        return $this->setRecurringType('REPEATED')->client->post("v1/registrations/{$registrationId}/payments", $this->parameters);
    }
}
