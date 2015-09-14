## Global Footer Code

Example of custom footer code that is added every Site within your instance. Can be used to add retargeting code or other javascript.

This code has access to the Site object, so IDs provided that are customer-specific can be dynamically inserted.

**Example code**

```html
<!-- global google analytics code -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-19512345-1']);
_gaq.push(['_trackPageview']);
...
</script>
{% endif %}

{% if site.partner_site_id %}
<!-- customer retargeting pixel -->
<img src="http://retargeting.yourdomain.com/ad/?
    src=pixel_cid&
    nid=12345&
    account_id={{ site.partner_site_id }}" width="1" height="1" border="0" alt="" />
{% endif %}
```
