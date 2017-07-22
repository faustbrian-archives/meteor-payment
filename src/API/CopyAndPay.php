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

class CopyAndPay extends AbstractAPI
{
    public function checkout(): HttpResponse
    {
        return $this->client->post('v1/checkouts', $this->parameters);
    }

    public function checkoutWithRegistration(): HttpResponse
    {
        return $this->setCreateRegistration(true)->client->post('v1/checkouts', $this->parameters);
    }

    public function getPaymentStatus(string $resourcePath): HttpResponse
    {
        return $this->client->get($resourcePath, $this->parameters);
    }
}
