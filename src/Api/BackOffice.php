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

class BackOffice extends AbstractApi
{
    public function capture($paymentId)
    {
        return $this->operation($paymentId, 'CP');
    }

    public function refund($paymentId)
    {
        return $this->operation($paymentId, 'RF');
    }

    public function reverse($paymentId)
    {
        return $this->operation($paymentId, 'RV');
    }

    private function operation($paymentId, $type)
    {
        $this->setPaymentType($type);

        return $this->post("v1/payments/$paymentId");
    }
}
