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

use Plients\Http\PendingHttpRequest;

abstract class AbstractAPI
{
    /**
     * @var \Plients\Http\PendingHttpRequest
     */
    protected $client;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * Create a new API class instance.
     *
     * @param \Plients\Http\PendingHttpRequest $client
     */
    public function __construct(PendingHttpRequest $client)
    {
        $this->client = $client;
    }

    public function setAmount($value): self
    {
        $this->addFormParameter('amount', $value);

        return $this;
    }

    public function setCurrency($value): self
    {
        $this->addFormParameter('currency', $value);

        return $this;
    }

    public function setPaymentBrand($value): self
    {
        $this->addFormParameter('paymentBrand', $value);

        return $this;
    }

    public function setPaymentType($value): self
    {
        $this->addFormParameter('paymentType', $value);

        return $this;
    }

    public function setDescriptor($value): self
    {
        $this->addFormParameter('descriptor', $value);

        return $this;
    }

    public function setMerchantTransactionId($value): self
    {
        $this->addFormParameter('merchantTransactionId', $value);

        return $this;
    }

    public function setMerchantInvoiceId($value): self
    {
        $this->addFormParameter('merchantInvoiceId', $value);

        return $this;
    }

    public function setAuthentication($data): self
    {
        $this->addFormParameter('authentication.userId', array_get($data, 'userId'));
        $this->addFormParameter('authentication.password', array_get($data, 'password'));
        $this->addFormParameter('authentication.entityId', array_get($data, 'entityId'));

        return $this;
    }

    public function setCreditCard($data): self
    {
        $this->addFormParameter('card.holder', array_get($data, 'holder'));
        $this->addFormParameter('card.number', array_get($data, 'number'));
        $this->addFormParameter('card.expiryMonth', array_get($data, 'expiryMonth'));
        $this->addFormParameter('card.expiryYear', array_get($data, 'expiryYear'));
        $this->addFormParameter('card.cvv', array_get($data, 'cvv'));

        return $this;
    }

    public function setVirtualAccount($accountId, $password): self
    {
        $this->addFormParameter('virtualAccount.accountId', $accountId);
        $this->addFormParameter('virtualAccount.password', $password);

        return $this;
    }

    public function setBankAccount($data): self
    {
        $this->addFormParameter('bankAccount.holder', array_get($data, 'holder'));
        $this->addFormParameter('bankAccount.bankName', array_get($data, 'bankName'));
        $this->addFormParameter('bankAccount.number', array_get($data, 'number'));
        $this->addFormParameter('bankAccount.iban', array_get($data, 'iban'));
        $this->addFormParameter('bankAccount.bankCode', array_get($data, 'bankCode'));
        $this->addFormParameter('bankAccount.bic', array_get($data, 'bic'));
        $this->addFormParameter('bankAccount.country', array_get($data, 'country'));
        $this->addFormParameter('bankAccount.mandate.id', array_get($data, 'mandate.id'));
        $this->addFormParameter('bankAccount.mandate.dateOfSignature', array_get($data, 'mandate.dateOfSignature'));
        $this->addFormParameter('transactionDueDate', array_get($data, 'transactionDueDate'));

        return $this;
    }

    public function setCustomer($data): self
    {
        $this->addFormParameter('customer.merchantCustomerId', array_get($data, 'merchantCustomerId'));
        $this->addFormParameter('customer.givenName', array_get($data, 'givenName'));
        $this->addFormParameter('customer.surname', array_get($data, 'surname'));
        $this->addFormParameter('customer.sex', array_get($data, 'sex'));
        $this->addFormParameter('customer.birthDate', array_get($data, 'birthDate'));
        $this->addFormParameter('customer.phone', array_get($data, 'phone'));
        $this->addFormParameter('customer.mobile', array_get($data, 'mobile'));
        $this->addFormParameter('customer.email', array_get($data, 'email'));
        $this->addFormParameter('customer.companyName', array_get($data, 'companyName'));
        $this->addFormParameter('customer.identificationDocType', array_get($data, 'identificationDocType'));
        $this->addFormParameter('customer.identificationDocId', array_get($data, 'identificationDocId'));
        $this->addFormParameter('customer.ip', array_get($data, 'ip'));

        return $this;
    }

    public function setBillingAddress($data): self
    {
        $this->addFormParameter('billing.street1', array_get($data, 'street1'));
        $this->addFormParameter('billing.street2', array_get($data, 'street2'));
        $this->addFormParameter('billing.city', array_get($data, 'city'));
        $this->addFormParameter('billing.state', array_get($data, 'state'));
        $this->addFormParameter('billing.postcode', array_get($data, 'postcode'));
        $this->addFormParameter('billing.country', array_get($data, 'country'));

        return $this;
    }

    public function setShippingAddress($data): self
    {
        $this->addFormParameter('shipping.givenName', array_get($data, 'givenName'));
        $this->addFormParameter('shipping.surname', array_get($data, 'surname'));
        $this->addFormParameter('shipping.street1', array_get($data, 'street1'));
        $this->addFormParameter('shipping.street2', array_get($data, 'street2'));
        $this->addFormParameter('shipping.city', array_get($data, 'city'));
        $this->addFormParameter('shipping.state', array_get($data, 'state'));
        $this->addFormParameter('shipping.postcode', array_get($data, 'postcode'));
        $this->addFormParameter('shipping.country', array_get($data, 'country'));

        return $this;
    }

    public function setCart($items): HttpResponse
    {
        $itemsCount = count($items);

        for ($i = 0; $i < $itemsCount; $i++) {
            $item = $items[$i];

            $this->addFormParameter("cart.items[$i].name", array_get($item, 'name'))
                 ->addFormParameter("cart.items[$i].merchantItemId", array_get($item, 'merchantItemId'))
                 ->addFormParameter("cart.items[$i].quantity", array_get($item, 'quantity'))
                 ->addFormParameter("cart.items[$i].type", array_get($item, 'type'))
                 ->addFormParameter("cart.items[$i].price", array_get($item, 'price'))
                 ->addFormParameter("cart.items[$i].currency", array_get($item, 'currency'))
                 ->addFormParameter("cart.items[$i].description", array_get($item, 'description'))
                 ->addFormParameter("cart.items[$i].tax", array_get($item, 'tax'))
                 ->addFormParameter("cart.items[$i].shipping", array_get($item, 'shipping'))
                 ->addFormParameter("cart.items[$i].discount", array_get($item, 'discount'));
        }

        return $this;
    }

    public function setCreateRegistration($value): self
    {
        $this->addFormParameter('createRegistration', $value);

        return $this;
    }

    public function setRecurringType($value): self
    {
        $this->addFormParameter('recurringType', $value);

        return $this;
    }

    public function set3DSecure($data): self
    {
        $this->addFormParameter('threeDSecure.eci', array_get($data, 'eci'));
        $this->addFormParameter('threeDSecure.verificationId', array_get($data, 'verificationId'));
        $this->addFormParameter('threeDSecure.xid', array_get($data, 'xid'));

        return $this;
    }

    public function setCustomParameter($key, $value): self
    {
        $this->addFormParameter("customParameters[$key]", $value);

        return $this;
    }

    public function setCustomParameters($data): self
    {
        if (!is_array($data)) {
            return $this;
        }

        foreach ($data as $key => $value) {
            $this->setCustomParameter($key, $value);
        }

        return $this;
    }

    public function setShopperResultUrl($value): self
    {
        $this->addFormParameter('shopperResultUrl', $value);

        return $this;
    }

    public function setNotificationUrl($value): self
    {
        $this->addFormParameter('notificationUrl', $value);

        return $this;
    }

    public function setTestMode($mode): self
    {
        $this->addFormParameter('testMode', $mode);

        return $this;
    }

    private function addFormParameter(string $key, $value): self
    {
        $this->parameters[$key] = $value;

        return $this;
    }
}
