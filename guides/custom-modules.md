## Custom Modules

Example of a simple javascript widget module that is powered from provided Partner IDs

### `custommodule/module.py`

Python that is run when rendering the module using the provided Site and module options

```python
from dhplatform.modules.base import BaseModule

class Module(BaseModule):
    """
    @widget_type options:
    - current_coupon
    - list_of_offers
    """

    widget_type = ModuleProperty(str, 'current_coupon')

    def run(self):
        # generate the url using the Widget Type and Customer Site ID
        # that will be passed in to render the widget
        widget_url = "https://widgets.mydomain.com/%s/%s" % (
            self.site['partner_site_id'], # partner provided ID for customer or site
            self.widget_type,
        )

        return {
            'widget_url': widget_url,
        }
```

### `custommodule/widget.html`

HTML that is rendered into the Site

```html
<div class="box"><div class="box-inner">
    <div class="embed">
        <script type="text/javascript" src="{{ widget_url }}"></script>
    </div>
</div></div>
```
