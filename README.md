# MeteorPayment PHP Client

[![Build Status](https://img.shields.io/travis/plients/MeteorPayment-PHP-Client/master.svg?style=flat-square)](https://travis-ci.org/plients/MeteorPayment-PHP-Client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/plients/meteorpayment.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/plients/MeteorPayment-PHP-Client.svg?style=flat-square)](https://github.com/plients/MeteorPayment-PHP-Client/releases)
[![License](https://img.shields.io/packagist/l/plients/MeteorPayment-PHP-Client.svg?style=flat-square)](https://packagist.org/packages/plients/MeteorPayment-PHP-Client)

https://gate2payments.docs.oppwa.com/

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
$ composer require plients/meteor-payment
```

## Usage

### SETUP THE METEOR PAYMENT CLIENT

```php
$meteor = new Plients\MeteorPayment\MeteorPayment('METEOR_USER_ID', 'METEOR_PASSWORD', 'METEOR_ENTITY_ID');
```

### PREPARE THE CHECKOUT

```php
$customerDetails = [
    'givenName' => 'Cookie',
    'surname' => 'Monster',
    'email' => 'cookie@monst.er',
];

$billingDetails = [
    'city' => 'Sesame Town',
    'country' => 'AL',
    'state' => 'Cuki',
    'street1' => 'Sesamestreet',
    'postcode' => 66666,
];

$cartItems = [
    [
        'merchantItemId' => 1,
        'quantity' => 5,
        'name' => 'Product 1',
        'price' => 10.00,
        'tax' => 20.00,
    ], [
        'merchantItemId' => 2,
        'quantity' => 10,
        'name' => 'Product 1',
        'price' => 0.99,
        'tax' => 20.00,
    ],
];

$meteor->api('CopyAndPay')
       ->setPaymentType('DB')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->setCustomer($customerDetails)
       ->setBillingAddress($billingDetails)
       ->setShippingAddress($billingDetails)
       ->setCart($cartItems)
       ->setCustomParameters(['key' => 'value'])
       ->checkout();
       // or ->checkoutWithRegistration() if we want to get a registrationId
```

### CAPTURE AN AUTHORIZATION

```php
$meteor->api('BackOffice')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->capture('PAYMENT_ID');
```

### REFUND A PAYMENT

```php
$meteor->api('BackOffice')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->refund('PAYMENT_ID');
```

### REVERSE A PAYMENT

```php
$meteor->api('BackOffice')
       ->reversal('PAYMENT_ID');
```

### SENDING THE INITIAL PAYMENT

```php
$creditCard = [
    'number' => '4200000000000000',
    'holder' => 'Jane Jones',
    'expiryMonth' => 05,
    'expiryYear' => 2018,
    'cvv' => 123,
];

$meteor->api('Recurring')
       ->setPaymentBrand('VISA')
       ->setPaymentType('PA')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->setCreditCard($creditCard)
       ->initialize();
```

### SENDING A REPEATED PAYMENT

```php
$meteor->api('Recurring')
       ->setPaymentType('DB')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->repeat('REGISTRATION_ID');
```

### SEND AN ONE-CLICK PAYMENT

```php
$meteor->api('OneClick')
       ->setPaymentType('DB')
       ->setCurrency('EUR')
       ->setAmount(10.00)
       ->charge('REGISTRATION_ID');
```

#### Available Setter-Methods

```php
$meteor->api('CopyAndPay')->setFormParameter($key, $value); // Used internal by all set*-methods
$meteor->api('CopyAndPay')->unsetFormParameter($key);
$meteor->api('CopyAndPay')->setAmount($value);
$meteor->api('CopyAndPay')->setCurrency($value);
$meteor->api('CopyAndPay')->setPaymentBrand($value);
$meteor->api('CopyAndPay')->setPaymentType($value);
$meteor->api('CopyAndPay')->setDescriptor($value);
$meteor->api('CopyAndPay')->setMerchantTransactionId($value);
$meteor->api('CopyAndPay')->setMerchantInvoiceId($value);
$meteor->api('CopyAndPay')->setAuthentication($data);
$meteor->api('CopyAndPay')->setCreditCard($data);
$meteor->api('CopyAndPay')->setVirtualAccount($accountId, $password);
$meteor->api('CopyAndPay')->setBankAccount($data);
$meteor->api('CopyAndPay')->setCustomer($data);
$meteor->api('CopyAndPay')->setBillingAddress($data);
$meteor->api('CopyAndPay')->setShippingAddress($data);
$meteor->api('CopyAndPay')->setCart($items);
$meteor->api('CopyAndPay')->setCreateRegistration($value);
$meteor->api('CopyAndPay')->setRecurringType($value);
$meteor->api('CopyAndPay')->set3DSecure($data);
$meteor->api('CopyAndPay')->setCustomParameter($key, $value);
$meteor->api('CopyAndPay')->setCustomParameters($data);
$meteor->api('CopyAndPay')->setShopperResultUrl($value);
$meteor->api('CopyAndPay')->setNotificationUrl($value);
$meteor->api('CopyAndPay')->setTestMode($mode);
```

## Testing

```bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

-   [Brian Faust](https://github.com/faustbrian)
-   [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
