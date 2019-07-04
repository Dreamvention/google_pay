# Google Pay for OpenCart v2.0.x-2.2.x

Google Pay is a digital wallet platform and online payment system developed by Google to power in-app and tap-to-pay purchases on mobile devices, enabling users to make payments with Android phones, tablets or watches.

Now you can offer one-click checkout for your customers, reduce abandoned cart rate and increase conversion. 

## Here is how you can set up Google Pay today:

1. [Download](https://www.opencart.com/index.php?route=marketplace/download&member_token=vYblOTrYQ1rwGyHBu7dbnkkG6ExRznUL&extension_id=37076) the Google Pay OpenCart Extension for the marketplace
![download from opencart](http://dl4.joxi.net/drive/2019/07/04/0014/3939/921443/43/36c6bd9427.jpg)
2. Install it via the Extension Installer or upload all file into the root folder of your OpenCart installation.
![go to extension installer](http://joxi.ru/J2bVw0vf0wEP82.jpg)
3. Go to Admin -> Extensions -> Payments and click install next to Google Pay
![go to extensions / payment methods](http://joxi.net/52azwGouEWNLRA.jpg)
4. Go to Google Pay settings.

### After we have installed the Google Pay extension, we will need to receive the Google Pay Merchant ID.

1. Visit https://pay.google.com
![Find Merchant ID and copy it](http://joxi.net/l2ZRw70szaBKL2.jpg)
2. Click settings 
3. Find Merchant ID and copy it
4. Go to Admin panel of Google Pay OpenCart extension and paste the Merchant ID
![Find Merchant ID and copy it](http://joxi.net/12MYwLXUl76pp2.jpg) 

There is one more step. Google pay acts as a storage of customer's credit card data. It does not actually fulfill the transactions, rather shares the tokenized credit card data with a payment gateway, such as Braintree. 

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
