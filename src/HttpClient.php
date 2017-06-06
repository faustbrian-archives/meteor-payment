<?php

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\MeteorPayment;

use BrianFaust\Unified\AbstractHttpClient;
use BrianFaust\MeteorPayment\Request\Modifiers\AuthModifier;
use BrianFaust\MeteorPayment\Request\Modifiers\LiveModeModifier;

class HttpClient extends AbstractHttpClient
{
    protected $options = [
        'headers' => [
           'User-Agent' => 'BrianFaust/MeteorPayment',
        ],
    ];

    protected $requestModifiers = [
        AuthModifier::class,
        LiveModeModifier::class,
    ];
}
