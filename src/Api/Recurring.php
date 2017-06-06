<?php

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\MeteorPayment\Api;

class Recurring extends AbstractApi
{
    public function initialize()
    {
        $this->setRecurringType('INITIAL');

        return $this->post('v1/payments');
    }

    public function repeat($registrationId)
    {
        $this->setRecurringType('REPEATED');

        return $this->post("v1/registrations/$registrationId/payments");
    }
}
