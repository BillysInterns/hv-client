HVClientLibPHP
==============
[![Build Status](https://travis-ci.org/BillysInterns/hv-client.png?branch=master)](https://travis-ci.org/BillysInterns/hv-client)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/BillysInterns/hv-client/badges/quality-score.png?s=d2c0e29fd9992c71ac7dca6210198d42ac3ee52b)](https://scrutinizer-ci.com/g/BillysInterns/hv-client/)

A PHP Library to interface with
[Microsoft® HealthVault™](https://www.healthvault.com/).

It adds a nicer object oriented programming interface and hides (most) of the
complicated XML parts in the HealthVault protocol.

Status
------

HVClientLibPHP is not a full featured HealthVault SDK, but should provide all
the required stuff to create powerful HealthVault applications with PHP.

It can basically handle all
[Things](http://developer.healthvault.com/pages/types/types.aspx) already,
but over the time we will add some more convenience function to the representing
classes.

But the number of implemented
[Methods](http://developer.healthvault.com/pages/methods/methods.aspx) is very
limited at the moment (the essential ones are available):
* GetPersonInfo
* GetThings
* PutThings

If you need more and understand the available
[Documentation](http://developer.healthvault.com/default.aspx), you can always
use HVCommunicatorPHP directly.


Usage
-----

This is a simple example to display all weight measurements:

```php
$hv = new HVClient($thumbPrint,$privateKey,$appId,$personId,$recordId)
$hv->connect();

$personInfo = $hv->getPersonInfo();
$recordId = $personInfo->getRecord()[0]->getId();

$things = $hv->getThings('Weight Measurement', $recordId);
foreach ($things as $thing) {
  print $thing->weight->value->kg;
}
```

To connect your PHP based HealthVault™ app, your app needs to authorized by
the user and the user himself needs to be authenticated against HealthVault™.
If any of these requirements are not met, HVClientLibPHP throws corresponding
exceptions. In this case you can create a link that takes the user to
HealthVault™ to authenticate himself and to authorize your app and takes him
back to your site afterwards:


For more examples have a look at the demo_app source code included in
HVClientLibPHP.

The HVClientLibPHP will never provide an API to register a new HealthVault™ app
or to guide you through the on-boarding process, because this could be easily
done using the
[Application Configuration Center](http://config.healthvault-ppe.com/).

So register your app there first and start coding afterwards.

The demo_app (aka Hello World) is already registered. For your first tests you
can also use it's credentials to start right away.

The unit tests also have been registered and the credentials have been included

Demo
----

The demo_app included in this repository currently demonstrates two features:
* It queries a user's HealthVault record for all
"[Things](http://developer.healthvault.com/pages/types/types.aspx)" and dumps the
raw XML content.
* It lists all files uploaded to your selected health record and lets you upload
additional files.

By default it uses the US pre production instance of HealthVault.

To get started, follow the install instructions above and put the demo_app folder
on a web server and access "demo_app/index.php".

Changes And Additions
---------------------

- Several things types have been added to the library, such as emotional state, sleep session, sleep related activity, and health journal entry. 
- Helper methods have been created to export health vault thing types as JSON and to facilitate creation of various thing types.
- The HV Connect function has been updated to support both online and offline connection modes.
- The Get Things function has been updated to support putting of pictures and files
- Unit tests have been created to test all of this functionality and some of the functionality of the original library.
- The HVCommunicator has been added to provide a more integrated connection

Licence
-------

[MIT](https://raw.github.com/BillysInterns/hv-client/master/LICENSE.md).
