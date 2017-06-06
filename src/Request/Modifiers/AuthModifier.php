<?php

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\MeteorPayment\Request\Modifiers;

use BrianFaust\Contracts\HttpClient;
use BrianFaust\Modifiers\AbstractModifier;

class AuthModifier extends AbstractModifier
{
    public function apply()
    {
        $this->httpClient->addQuery('authentication.userId', $this->httpClient->getConfig('userId'));
        $this->httpClient->addQuery('authentication.password', $this->httpClient->getConfig('password'));
        $this->httpClient->addQuery('authentication.entityId', $this->httpClient->getConfig('entityId'));

        return $this->httpClient;
    }
}
