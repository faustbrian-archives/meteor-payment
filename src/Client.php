<?php

declare(strict_types=1);

/*
 * This file is part of Meteor Payment PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\MeteorPayment;

use BrianFaust\Http\Http;

class Client
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $entityId;

    /**
     * @var bool
     */
    private $sandbox;

    /**
     * Create a new client instance.
     *
     * @param string $userId
     * @param string $password
     * @param string $entityId
     * @param bool   $sandbox
     */
    public function __construct(string $userId, string $password, string $entityId, bool $sandbox = true)
    {
        $this->userId = $userId;
        $this->password = $password;
        $this->entityId = $entityId;
        $this->sandbox = $sandbox;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \BrianFaust\MeteorPayment\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $url = $this->sandbox ? 'https://test.oppwa.com' : 'https://oppwa.com';

        $client = Http::withBaseUri("$url?authentication.userId={$this->userId}&authentication.password={$this->password}&authentication.entityId={$this->entityId}");

        $class = "BrianFaust\\MeteorPayment\\API\\{$name}";

        return new $class($client);
    }
}
