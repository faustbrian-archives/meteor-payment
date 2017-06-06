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

use BrianFaust\Unified\AbstractApi as BaseApi;

abstract class AbstractApi extends BaseApi
{
    public function setAmount($value)
    {
        $this->addFormParameter('amount', $value);
    }

    public function setCurrency($value)
    {
        $this->addFormParameter('currency', $value);
    }

    public function setPaymentBrand($value)
    {
        $this->addFormParameter('paymentBrand', $value);
    }

    public function setPaymentType($value)
    {
        $this->addFormParameter('paymentType', $value);
    }

    public function setDescriptor($value)
    {
        $this->addFormParameter('descriptor', $value);
    }

    public function setMerchantTransactionId($value)
    {
        $this->addFormParameter('merchantTransactionId', $value);
    }

    public function setMerchantInvoiceId($value)
    {
        $this->addFormParameter('merchantInvoiceId', $value);
    }

    public function setAuthentication($data)
    {
        $this->addFormParameter('authentication.userId', array_get($data, 'userId'));
        $this->addFormParameter('authentication.password', array_get($data, 'password'));
        $this->addFormParameter('authentication.entityId', array_get($data, 'entityId'));
    }

    public function setCreditCard($data)
    {
        $this->addFormParameter('card.holder', array_get($data, 'holder'));
        $this->addFormParameter('card.number', array_get($data, 'number'));
        $this->addFormParameter('card.expiryMonth', array_get($data, 'expiryMonth'));
        $this->addFormParameter('card.expiryYear', array_get($data, 'expiryYear'));
        $this->addFormParameter('card.cvv', array_get($data, 'cvv'));
    }

    public function setVirtualAccount($accountId, $password)
    {
        $this->addFormParameter('virtualAccount.accountId', $accountId);
        $this->addFormParameter('virtualAccount.password', $password);
    }

    public function setBankAccount($data)
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
    }

    public function setCustomer($data)
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
    }

    public function setBillingAddress($data)
    {
        $this->addFormParameter('billing.street1', array_get($data, 'street1'));
        $this->addFormParameter('billing.street2', array_get($data, 'street2'));
        $this->addFormParameter('billing.city', array_get($data, 'city'));
        $this->addFormParameter('billing.state', array_get($data, 'state'));
        $this->addFormParameter('billing.postcode', array_get($data, 'postcode'));
        $this->addFormParameter('billing.country', array_get($data, 'country'));
    }

    public function setShippingAddress($data)
    {
        $this->addFormParameter('shipping.givenName', array_get($data, 'givenName'));
        $this->addFormParameter('shipping.surname', array_get($data, 'surname'));
        $this->addFormParameter('shipping.street1', array_get($data, 'street1'));
        $this->addFormParameter('shipping.street2', array_get($data, 'street2'));
        $this->addFormParameter('shipping.city', array_get($data, 'city'));
        $this->addFormParameter('shipping.state', array_get($data, 'state'));
        $this->addFormParameter('shipping.postcode', array_get($data, 'postcode'));
        $this->addFormParameter('shipping.country', array_get($data, 'country'));
    }

    public function setCart($items)
    {
        $itemsCount = count($items);

        for ($i = 0; $i < $itemsCount; ++$i) {
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

    public function setCreateRegistration($value)
    {
        $this->addFormParameter('createRegistration', $value);
    }

    public function setRecurringType($value)
    {
        $this->addFormParameter('recurringType', $value);
    }

    public function set3DSecure($data)
    {
        $this->addFormParameter('threeDSecure.eci', array_get($data, 'eci'));
        $this->addFormParameter('threeDSecure.verificationId', array_get($data, 'verificationId'));
        $this->addFormParameter('threeDSecure.xid', array_get($data, 'xid'));
    }

    public function setCustomParameter($key, $value)
    {
        $this->addFormParameter("customParameters[$key]", $value);
    }

    public function setCustomParameters($data)
    {
        if (! is_array($data)) {
            return $this;
        }

        foreach ($data as $key => $value) {
            $this->setCustomParameter($key, $value);
        }

        return $this;
    }

    public function setShopperResultUrl($value)
    {
        $this->addFormParameter('shopperResultUrl', $value);
    }

    public function setNotificationUrl($value)
    {
        $this->addFormParameter('notificationUrl', $value);
    }

    public function setTestMode($mode)
    {
        $this->addFormParameter('testMode', $mode);
    }
}
