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

class LiveModeModifier extends AbstractModifier
{
    public function apply()
    {
        $this->httpClient->setOption('base_uri', $this->httpClient->getConfig('sandbox') ? 'https://test.oppwa.com' : 'https://oppwa.com');

        return $this->httpClient;
    }
}
