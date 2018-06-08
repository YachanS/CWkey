<?php

// Stripe singleton
require('stripe/lib/Stripe.php');

// Utilities
require('stripe/lib/Util/AutoPagingIterator.php');
require('stripe/lib/Util/LoggerInterface.php');
require('stripe/lib/Util/DefaultLogger.php');
require('stripe/lib/Util/RandomGenerator.php');
require('stripe/lib/Util/RequestOptions.php');
require('stripe/lib/Util/Set.php');
require('stripe/lib/Util/Util.php');

// HttpClient
require('stripe/lib/HttpClient/ClientInterface.php');
require('stripe/lib/HttpClient/CurlClient.php');

// Errors
require('stripe/lib/Error/Base.php');
require('stripe/lib/Error/Api.php');
require('stripe/lib/Error/ApiConnection.php');
require('stripe/lib/Error/Authentication.php');
require('stripe/lib/Error/Card.php');
require('stripe/lib/Error/Idempotency.php');
require('stripe/lib/Error/InvalidRequest.php');
require('stripe/lib/Error/Permission.php');
require('stripe/lib/Error/RateLimit.php');
require('stripe/lib/Error/SignatureVerification.php');

// OAuth errors
require('stripe/lib/Error/OAuth/OAuthBase.php');
require('stripe/lib/Error/OAuth/InvalidClient.php');
require('stripe/lib/Error/OAuth/InvalidGrant.php');
require('stripe/lib/Error/OAuth/InvalidRequest.php');
require('stripe/lib/Error/OAuth/InvalidScope.php');
require('stripe/lib/Error/OAuth/UnsupportedGrantType.php');
require('stripe/lib/Error/OAuth/UnsupportedResponseType.php');

// API operations
require('stripe/lib/ApiOperations/All.php');
require('stripe/lib/ApiOperations/Create.php');
require('stripe/lib/ApiOperations/Delete.php');
require('stripe/lib/ApiOperations/NestedResource.php');
require('stripe/lib/ApiOperations/Request.php');
require('stripe/lib/ApiOperations/Retrieve.php');
require('stripe/lib/ApiOperations/Update.php');

// Plumbing
require('stripe/lib/ApiResponse.php');
require('stripe/lib/StripeObject.php');
require('stripe/lib/ApiRequestor.php');
require('stripe/lib/ApiResource.php');
require('stripe/lib/SingletonApiResource.php');

// Stripe API Resources
require('stripe/lib/Account.php');
require('stripe/lib/AlipayAccount.php');
require('stripe/lib/ApplePayDomain.php');
require('stripe/lib/ApplicationFee.php');
require('stripe/lib/ApplicationFeeRefund.php');
require('stripe/lib/Balance.php');
require('stripe/lib/BalanceTransaction.php');
require('stripe/lib/BankAccount.php');
require('stripe/lib/BitcoinReceiver.php');
require('stripe/lib/BitcoinTransaction.php');
require('stripe/lib/Card.php');
require('stripe/lib/Charge.php');
require('stripe/lib/Collection.php');
require('stripe/lib/CountrySpec.php');
require('stripe/lib/Coupon.php');
require('stripe/lib/Customer.php');
require('stripe/lib/Dispute.php');
require('stripe/lib/EphemeralKey.php');
require('stripe/lib/Event.php');
require('stripe/lib/ExchangeRate.php');
require('stripe/lib/FileUpload.php');
require('stripe/lib/Invoice.php');
require('stripe/lib/InvoiceItem.php');
require('stripe/lib/IssuerFraudRecord.php');
require('stripe/lib/LoginLink.php');
require('stripe/lib/Order.php');
require('stripe/lib/OrderReturn.php');
require('stripe/lib/Payout.php');
require('stripe/lib/Plan.php');
require('stripe/lib/Product.php');
require('stripe/lib/Recipient.php');
require('stripe/lib/RecipientTransfer.php');
require('stripe/lib/Refund.php');
require('stripe/lib/SKU.php');
require('stripe/lib/Source.php');
require('stripe/lib/SourceTransaction.php');
require('stripe/lib/Subscription.php');
require('stripe/lib/SubscriptionItem.php');
require('stripe/lib/ThreeDSecure.php');
require('stripe/lib/Token.php');
require('stripe/lib/Topup.php');
require('stripe/lib/Transfer.php');
require('stripe/lib/TransferReversal.php');
require('stripe/lib/UsageRecord.php');

// OAuth
require('stripe/lib/OAuth.php');

// Webhooks
require('stripe/lib/Webhook.php');
require('stripe/lib/WebhookSignature.php');
