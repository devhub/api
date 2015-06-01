<?php
require 'OAuthRequestSigner.php';

define(BASE_WIDGET_URI, 'http://builder.yourbrand.com/sso/v2/widget.js');
define(CONSUMER_KEY, 'YOURCONSUMERKEY');
define(CONSUMER_SECRET, 'YOURCONSUMERSECRET');

/**
 * Helper function which generates the proper OAuth URI.
 */
function generate_oauth_uri(array $params) {
    $uri = BASE_WIDGET_URI;
    $secrets = array(
        'consumer_key' => CONSUMER_KEY,
        'consumer_secret' => CONSUMER_SECRET,
        'signature_methods' => array('HMAC-SHA1'),
    );
    OAuthStore::instance("Session", $secrets);
    $request = new OAuthRequestSigner($uri, 'GET');
    foreach ($params as $key => $value) {
        if (is_array($value)) {
            $value = implode(',', $value);
        }
        $request->setParam($key, $value);
    }
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
  <script src="show-links.js"></script>
</body>
