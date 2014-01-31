# Sites

## List sites

List all sites including active, deleted, non-published and published

    GET /api/v2/sites/

List all active sites

	GET /api/v2/sites/?deleted=0

### Parameters

Name | Type | Description
-----|------|--------------
`business_id`|`string`|Filter to sites associated with a particular `Business`
`deleted`|`string`|Return sites based on if they are active (`0`) or deleted/disabled (`1`)
`location_id`|`string`|Filter to sites associated with a particular `Location`

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/sites/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 1039
  },
  "objects": [
    {
      "about": "<p>Here is a description of this Site</p>",
      "added": "2013-06-19T11:17:13",
      "base_directory": "/",
      "business_id": 24305,
      "deleted": false,
      "domain": "cloudbackend.net",
      "formatted_domain": "somesite.cloudbackend.net",
      "formatted_url": "http://somesite.cloudbackend.net/",
      "hash": "934dc52",
      "id": 1281131,
      "keywords": "",
      "modified": "2014-01-28T13:20:13",
      "parent_id": null,
      "partner_site_id": null,
      "partner_sub_id": null,
      "published": true,
      "resource_uri": "/api/v2/sites/1281131/",
      "subdomain": "somesite",
      "theme_id": 449,
      "title": "Site Title (internal use only)",
      "type": "default",
      "user_id": 248114,
      "www_primary": false
    },
    {
      "about": "<p>This is Site number two</p>",
      "added": "2013-06-19T11:17:13",
      "base_directory": "/",
      "business_id": 15555,
      "deleted": false,
      "domain": "cloudbackend.net",
      "formatted_domain": "www.somerealdomain.com",
      "formatted_url": "http://www.somerealdomain.com/",
      "hash": "8c7d6s",
      "id": 1281132,
      "keywords": "",
      "modified": "2014-01-28T13:20:13",
      "parent_id": null,
      "partner_site_id": null,
      "partner_sub_id": null,
      "published": true,
      "resource_uri": "/api/v2/sites/1281132/",
      "subdomain": "www",
      "theme_id": 449,
      "title": "Site Title (internal use only)",
      "type": "default",
      "user_id": 248114,
      "www_primary": true
    },
    ...
  ]
}
```

## Get a single issue

Fetch the Site detail using the `Site.id`

    GET /api/v2/sites/:id/

### Response

```json
{
  "about": "<p>Here is a description of this Site</p>",
  "added": "2013-06-19T11:17:13",
  "base_directory": "/",
  "business": {
    ... fully expanded `Business` object
  },
  "business_id": 24305,
  "deleted": false,
  "domain": "cloudbackend.net",
  "formatted_domain": "somesite.cloudbackend.net",
  "formatted_url": "http://somesite.cloudbackend.net/",
  "hash": "934dc52",
  "id": 1281131,
  "keywords": "",
  "linklists": [
    ... configuration of the Site's menu
  ],
  "locations": [
    ... list of associated `Location` objects
  ],
  "logo": {
    ... fully expanded `Logo` object
  },
  "modified": "2014-01-28T13:20:13",
  "parent_id": null,
  "partner_site_id": null,
  "partner_sub_id": null,
  "published": true,
  "resource_uri": "/api/v2/sites/1281131/",
  "subdomain": "somesite",
  "theme_id": 449,
  "theme_settings": {
    "body_background_color": "#000000",
    "hide_navigation": false
  },
  "title": "Site Title (internal use only)",
  "type": "default",
  "user": {
    ... fully expanded `User` object
  },
  "user_id": 248114,
  "www_primary": false
}
```

