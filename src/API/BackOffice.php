<?php

declare(strict_types=1);

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\MeteorPayment\API;

use Plients\Http\HttpResponse;

class BackOffice extends AbstractAPI
{
    public function capture(int $paymentId): HttpResponse
    {
        return $this->operation($paymentId, 'CP');
    }

    public function refund(int $paymentId): HttpResponse
    {
        return $this->operation($paymentId, 'RF');
    }

    public function reverse(int $paymentId): HttpResponse
    {
        return $this->operation($paymentId, 'RV');
    }

    private function operation(int $paymentId, string $paymentType): HttpResponse
    {
        return $this->setPaymentType($paymentType)->client->post("v1/payments/{$paymentId}", $this->parameters);
    }
}
