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

class OneClick extends AbstractAPI
{
    public function charge(int $registrationId): HttpResponse
    {
        return $this->client->post("v1/registrations/{$registrationId}/payments", $this->parameters);
    }
}
