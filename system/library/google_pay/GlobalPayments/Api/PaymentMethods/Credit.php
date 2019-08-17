<?php

namespace GlobalPayments\Api\PaymentMethods;

use GlobalPayments\Api\Builders\AuthorizationBuilder;
use GlobalPayments\Api\Entities\ThreeDSecure;
use GlobalPayments\Api\Entities\Enums\PaymentMethodType;
use GlobalPayments\Api\Entities\Enums\TransactionType;
use GlobalPayments\Api\PaymentMethods\Interfaces\IAuthable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IBalanceable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IChargable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IEncryptable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IPaymentMethod;
use GlobalPayments\Api\PaymentMethods\Interfaces\IPrePayable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IRefundable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IReversable;
use GlobalPayments\Api\PaymentMethods\Interfaces\ITokenizable;
use GlobalPayments\Api\PaymentMethods\Interfaces\IVerifyable;

abstract class Credit implements
    IPaymentMethod,
    IEncryptable,
    ITokenizable,
    IChargable,
    IAuthable,
    IRefundable,
    IReversable,
    IVerifyable,
    IPrePayable,
    IBalanceable
{
    public $encryptionData;
    public $paymentMethodType = PaymentMethodType::CREDIT;
    
    /**
     * The token value representing the card.
     *
     * For `TransactionModifier.Encrypted_Mobile` transactions, this value is the
     * encrypted payload from the mobile payment scheme.
     */
    public $token;

    /**
     * The type of mobile device used in `TransactionModifier.Encrypted_Mobile`
     * transactions.
     */
    public $mobileType;

    /**
     * Secure 3d Data attached to the card
     * @var ThreeDSecure
     */
    public $threeDSecure;

    /**
     * The card type of the manual entry data.
     */
    public $cardType;

    /**
     * Authorizes the payment method
     *
     * @param string|float $amount Amount to authorize
     *
     * @return AuthorizationBuilder
     */
    public function authorize($amount = null)
    {
        return (new AuthorizationBuilder(TransactionType::AUTH, $this))
            ->withAmount($amount);
    }

    /**
     * Authorizes the payment method and captures the entire authorized amount
     *
     * @param string|float $amount Amount to authorize
     *
     * @return AuthorizationBuilder
     */
    public function charge($amount = null)
    {
        return (new AuthorizationBuilder(TransactionType::SALE, $this))
            ->withAmount($amount);
    }

    /**
     * Adds value to the payment method
     *
     * @param string|float $amount Amount to add
     *
     * @return AuthorizationBuilder
     */
    public function addValue($amount = null)
    {
        return (new AuthorizationBuilder(TransactionType::ADD_VALUE, $this))
            ->withAmount($amount);
    }

    /**
     * Inquires the balance of the payment method
     *
     * @param InquiryType $inquiry Type of inquiry
     *
     * @return AuthorizationBuilder
     */
    public function balanceInquiry($inquiry = null)
    {
        return (new AuthorizationBuilder(TransactionType::BALANCE, $this))
            ->withBalanceInquiryType($inquiry);
    }

    /**
     * Refunds the payment method
     *
     * @param string|float $amount Amount to refund
     *
     * @return AuthorizationBuilder
     */
    public function refund($amount = null)
    {
        return (new AuthorizationBuilder(TransactionType::REFUND, $this))
            ->withAmount($amount);
    }

    /**
     * Reverses the payment method
     *
     * @param string|float $amount Amount to reverse
     *
     * @return AuthorizationBuilder
     */
    public function reverse($amount = null)
    {
        return (new AuthorizationBuilder(TransactionType::REVERSAL, $this))
            ->withAmount($amount);
    }

    /**
     * Verifies the payment method
     *
     * @return AuthorizationBuilder
     */
    public function verify()
    {
        return new AuthorizationBuilder(TransactionType::VERIFY, $this);
    }

    /**
     * Tokenizes the payment method
     *
     * @return AuthorizationBuilder
     */
    public function tokenize()
    {
        return $this->verify()
            ->withRequestMultiUseToken(true);
    }
    
    public function getDccRate($dccRateType, $amount, $currency, $ccp, $orderId)
    {
        return (new AuthorizationBuilder(TransactionType::DCC_RATE_LOOKUP, $this))
                        ->withAmount($amount)
                        ->withCurrency($currency)
                        ->withDccRateType($dccRateType)
                        ->withDccProcessor($ccp)
                        ->withDccType("1")
                        ->withOrderId($orderId)
                        ->execute();
    }
}
