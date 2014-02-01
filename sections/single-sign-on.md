# Single Sign On (SSO)

This user guide describes the service provided for our partners, where your users can sign into the Site Builder, and optionally be redirected directly into the builder for an existing site, using your website's credentials. This is generally known as a "Single Sign-On", or SSO, system.

Contained in this document:

* [Access requirements](#access-requirements)
* [Prerequisites](#prerequisites)
* [Request parameters](#request-parameters)
* [Code examples](#code-examples)
 * [Python/Django](#python-django-example)

## Access requirements

* Access has to be approved and enabled within your private label
* You will be given an OAuth "public" key (`CONSUMER_KEY`) and a "secret" key (`CONSUMER_SECRET`)
* You will also be given a base URI, signifying where the widget javascript requests will be made:
 * `BASE_WIDGET_URI`: The base URI for the single sign-on (logs the user into the site management interface)

## Prerequisites

* The platform uses portions of the OAuth protocol to verify that a user has access to it's SSO system. You will need to install an OAuth library that fits in with your server technology. There are several linked to the OAuth code website.
* The widget examples shown use the jQuery JavaScript library to render itself, but any form of javascript can be used to interact with the widget

## Request Parameters

Your code will generate a signed URI, which is the main way that the API interacts with your web page. The following are the required GET request parameters for both SSO and direct-to-builder access type:

Name | Type | Description
-----|------|--------------
`email`|`string`|The email address of the partner user
`partner_user_id`|`string`|This is the unique user ID you use in your user management system
||
**Optional**||
`first_name`|`string`|The first (given) name of the partner user. Will be used within the builder interface under their account settings
`last_name`|`string`|The last (family) name of the partner user

For direct-to-builder access, the following parameters are also required:

Name | Type | Description
-----|------|--------------
`partner_site_ids`|`string`|These are is the unique site IDs you have assigned to the Sites you have created under the private label. These IDs should be comma separated if passing more than one during the request. (i.e. `12345,23145`)

## Code examples

All of the examples utilize the following jQuery snippet for displaying the SSO links on a page.

### `show-links.js`

```javascript
$(function() {

  $('<p><a href="' + sb.uris.user + '">Login as user</a></p>')
    .appendTo('#body');

  $.each(sb.uris.sites, function(k, uri) {
    $('<p><a href="' + uri + '">Login to site ' + k + '</a></p>')
      .appendTo('#body');
  });

});
```

### Python/Django example

The following example uses Python and Django to generate the code necessary for the login widget to render, and direct links to the builder for specific sites. It uses the python oauth library to generate the signed oauth urls.

#### `views.py`

```python
from django.shortcuts import render_to_response
from django.template import RequestContext
from oauth.oauth import (
    OAuthConsumer, OAuthRequest, OAuthSignatureMethod_HMAC_SHA1)


def generate_oauth_uri(params=None):
    '''Helper function which generates the proper OAuth URI.'''
    uri = BASE_WIDGET_URI
    consumer = OAuthConsumer(CONSUMER_KEY, CONSUMER_SECRET)
    request = OAuthRequest.from_consumer_and_token(consumer,
                                                   http_url=uri,
                                                   parameters=params)
    request.sign_request(OAuthSignatureMethod_HMAC_SHA1(), consumer, '')
    return request.to_url()


def single_sign_on(request):
    '''The actual view'''
    data = {
        'partner_user_id': '1234567890',
        'email': 'john@example.com',
        'first_name': 'John',
        'last_name': 'Doe',
        'partner_site_ids': '12345',
    }
    return render_to_response('index.html', {
        'widget_uri': generate_oauth_uri(data),
    })
```

#### `index.html`

```html
<!doctype html>
<html>
<body>
  <div id="body"></div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="{{ widget_uri }}"></script>
  <script src="/static/js/show-links.js"></script>
</body>
</html>
```

### PHP5 example

Here is the same example, except using PHP5 (without a framework) and the [oauth-php library](https://code.google.com/p/oauth-php/).

```php
<?php
require 'OAuthRequestSigner.php';

/**
 * Helper function which generates the proper OAuth URI.
 */
function generate_oauth_uri(array $params) {
    $uri = BASE_WIDGET_URI;
    $request = new OAuthRequestSigner($uri, 'GET');
    foreach ($params as $key => $value) {
        if (is_array($value)) {
            $value = implode(',', $value);
        }
        $request->setParam($key, $value);
    }
    $secrets = array(
        'consumer_key' => CONSUMER_KEY,
        'consumer_secret' => CONSUMER_SECRET,
        'signature_methods' => array('HMAC-SHA1'),
    );
    $request->sign(0, $secrets);
    return sprintf('%s?%s', $uri,
                   $request->getQueryString(FALSE));
}

$params = array(
    'partner_user_id' => '1234567890',
    'email' => 'john@example.com',
    'first_name' => 'John',
    'last_name' => 'Doe',
    'partner_site_ids' => '12345',
);
$widget_uri = generate_oauth_uri($params);

?>
<!doctype html>
<html>
<body>
  <div id="body"></div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="<?php echo $widget_uri; ?>"></script>
  <script src="/static/js/show-links.js"></script>
</body>
</html>
```