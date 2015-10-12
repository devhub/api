## Custom Analytics Adaptors

Using the supplied `partner_site_id` or other customer information, adaptors can be auto-enabled to push event data to a customer provided system.

### Example adaptor (javascript)

This is a example of a simple adaptor that pushes event data using tracking pixels dropped into the page. This pixels pass a campaign ID that is mapped to our `Site.partner_site_id`

```javascript
var AnalyticsAdaptor = require('./adaptor.coffee');
var utils = require('backend/utils.coffee');

var AnalyticsAdaptorCustom = (function(superClass) {

  AnalyticsAdaptorCustom.prototype.eventIdMap = {
    'link-homepage': 1,
    'link-email': 2,
    'link-phone': 3,
    'link-facebook': 4,
    'link-twitter': 5,
    'link-gplus': 6,
    'form-submit': 15,
    'map-user-interact': 16,
    'coupon-redeem': 7,
    'coupon-email': 8,
    'coupon-sms': 9,
    'coupon-print': 10,
    'coupon-share': 11,
    'coupon-share-facebook': 12,
    'coupon-share-twitter': 13,
    'coupon-share-gplus': 14
  };

  function AnalyticsAdaptorCustom(analytics, client) {
    this.client = client;
    AnalyticsAdaptorCustom.__super__.constructor.call(this, analytics, this.client);
    this.campaignId = sb.siteInfo['partner_site_id'];
    this.source = utils.getParam('utm_source');
  }

  AnalyticsAdaptorCustom.prototype.isTrackable = function(event) {
    return this.eventIdMap[event] != null;
  };

  AnalyticsAdaptorCustom.prototype.eventToId = function(event) {
    return this.eventIdMap[event];
  };

  AnalyticsAdaptorCustom.prototype.onEvent = function(event, value) {
    var eventId, url;
    if (!this.isTrackable(event)) return;
    eventId = this.eventToId(event);
    url = 'https://i.ipromote.com/ad/?typ=98';
    if (this.source) {
      url += "&source=" + this.source;
    } else {
      url += "&source=Other";
    }
    url += "&event=" + eventId + "&cid=" + this.campaignId;
    return $('body').append("<img src='" + url + "' width='0' height='0' border='0' />");
  };

  return AnalyticsAdaptorCustom;

})(AnalyticsAdaptor);

module.exports = AnalyticsAdaptorCustom;
```
