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

class CopyAndPay extends AbstractApi
{
    public function checkout()
    {
        return $this->post('v1/checkouts');
    }

    public function checkoutWithRegistration()
    {
        $this->setCreateRegistration(true);

        return $this->checkout();
    }

    public function getPaymentStatus($resourcePath)
    {
        return $this->get($resourcePath);
    }
}
