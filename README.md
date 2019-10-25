# Google Pay<sup>TM</sup> with OpenCart 

Google Pay lets your customers pay with the press of a button — using payment methods saved to their Google Accounts. Google Pay works for both customers shopping at physical store and online in your apps or websites. Now, this is also possible with OpenCart's extension.

With Google Pay extension, you can offer one-click checkout for your customers, reduce abandoned cart rate and increase conversion. 

## Here is how you can set up Google Pay today:

1. By using Google Pay extension, you adhere to the Google Pay APIs [Acceptable Use Policy](https://payments.developers.google.com/terms/aup) and accept the terms defined in the [Google Pay API Terms of Service](https://payments.developers.google.com/terms/sellertos).
2. [Download](https://www.opencart.com/index.php?route=marketplace/download&member_token=vYblOTrYQ1rwGyHBu7dbnkkG6ExRznUL&extension_id=37076) the Google Pay OpenCart Extension for the marketplace
![download from opencart](http://dl4.joxi.net/drive/2019/07/04/0014/3939/921443/43/36c6bd9427.jpg)
3. Install it via the Extension Installer or upload all file into the root folder of your OpenCart installation.
![go to extension installer](http://joxi.ru/J2bVw0vf0wEP82.jpg)
4. Go to Admin -> Extensions -> Payments and click install next to Google Pay
![go to extensions / payment methods](http://joxi.net/52azwGouEWNLRA.jpg)
5. Go to Google Pay settings.

### After we have installed the Google Pay extension, we will need to receive the Google Pay Merchant ID.

1. Visit https://pay.google.com
![Find Merchant ID and copy it](http://joxi.net/l2ZRw70szaBKL2.jpg)
2. Click settings 
3. Find Merchant ID and copy it
4. Go to Admin panel of Google Pay OpenCart extension and paste the Merchant ID
![Find Merchant ID and copy it](http://joxi.net/12MYwLXUl76pp2.jpg) 

**IMPORTANT NOTES** &nbsp;&nbsp;&nbsp;&nbsp;Google Pay only generates transaction data, but does not actually process or settle the payment. Thus, the transaction data has to be sent to a Payment Service Provider (PSP), such as Braintree. 

## Google pay with Braintree

Let's see how we can connect Google Pay with Braintree, one of many supported gateways. 

1. log in to Braintree https://www.braintreegateway.com/login
![Log in to braintree](http://joxi.ru/v29Pg09hZOX7pm.jpg) 
2. Click on the gear icon in the top right corner
![Find gear icon and go to processing](http://joxi.ru/Vrw8kK1S75wZvm.jpg) 
3. Click Processing from the drop-down menu
4. Scroll to the Payment Methods section
![FActivate google pay for braintree](http://joxi.ru/EA4zlJEuoKnbMm.jpg) 
5. Next to Google Pay, click the toggle to turn it on
6. In the top menu click API
![Click API in menu and generate new api keys](http://joxi.ru/Vm6xNgpF4XQydA.jpg) 
7. Now generate a New API key and a New Tokenized key 
8. Return to the Admin panel of Google Pay OpenCart extension and open tab Gateway. 
![Go to OpenCart Google pay admin panel](http://joxi.ru/gmvvxLkuqQwpem.jpg) 
9. Select Braintree and past the credentials from Braintree API tab accordingly.  
![Click view to see private key ](http://joxi.ru/GrqXRQ3F48wpXA.jpg)
![Copy the credentials to OpenCart admin panel](http://joxi.ru/p279JlzcKD9Oar.jpg)
10. Select Braintree Environment as Production/Live
11. In tab General select Status Enabled and click Save.

That is it. You have successfully setup Google Pay with Braintree for OpenCart. 

![Buy with Google Pay on OpenCart Checkout](http://joxi.ru/52azwGouEWN6RA.jpg) 

Your customer will thank you for simplifying their life as well as securing their credit card information since they don't have to enter their credit card data on the site and google pay only shares the tokenized credit card data.   


## Google pay with Global Payments

Global payments is a popular payment method used with Google pay. 

1. Register with Global Payments.

New merchants can sign up for Global Payments services by completing the following form:
https://www.globalpaymentsinc.com/en-gb/contact-us/new-customers  

![Create account with Global Payments](http://joxi.net/gmvvxLkuqwlQlm.jpg)

2. Once onboarded, your account manager will securely pass to you your account details:
Merchant ID (CLient ID)
Shared Secret

These are the details you need to get started with Global Payments eCommerce.

3. In order to enable Google Pay on Global Payments eCommerce, simply request this from your account manager.

4. In your OpenCart admin panel go to Google Pay -> Gateways and select Global Payments. Enter the credentials as follows. 

![Copy the credentials to OpenCart admin panel](http://joxi.net/52azwGouENpvlA.jpg)

5. Select Global Payments Environment as Production/Live

6. In tab General select Status Enabled and click Save.


That is it. You have successfully setup Google Pay with Global Payments for OpenCart. 
