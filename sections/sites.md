# Sites

Covered in this doc:
* [List sites](#list-sites)
* [Get a single site](#get-a-single-site)
* [Create a site](#create-a-site)
* [Passing a partner_user_id](#passing-a-partner_user_id)

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

## Get a single site

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

## Create a site

    POST /api/v2/sites/

### Parameters

Name | Type | Description
-----|------|--------------
`domain`|`string`|**required**
`subdomain`|`string`|**required** Must be provided, if site is hosted under a registered domain, use `www`
`theme_id`|`integer`|**required** You will be supplied a list of valid theme IDs
`title`|`string`|**required** This is the name of the site displayed in the site editor user interfaces
`user_id` or `partner_user_id`|`integer` or `string`|**required** If you know the user account you want to publish this site on the behalf of, use `user_id`. If you don't know the user ID, you can use the `partner_user_id` method described further down this document.
||
**Optional**||
`about`|`string`|This is a text summary describing this site, formatted as HTML
`base_directory`|`string`|Under private labels with sub-directory based sites, this is where it is defined (defaults to slash `/` but an example might be `/blog/username/`)
`contact_email`|`string`|This defaults to the email address of the Site's `user_id`, but can be set on a site-by-site basis with this parameter
`published`|`boolean`|Unpublished sites are viewable via preview links and within the Site Builder, but the live site address (domain/subdomain) will respond with a `404` status code. Defaults to `true`
`www_primary`|`boolean`| This parameter is used to configure how the address of the site is displayed by default. `www_primary` of `true` would be displayed as `www.domain.com`, where `www_primary` of `false` would be displayed as `domain.com`. Either address is still accessible by site visitors and the platform will automatically redirect (`301` status code) to the preferred display. By default, sites with registered domains (i.e. `domain.com`) will be set to `true`, subdomain sites (i.e. `somesite.domain.com`) will be set to `false`

#### Example

```json
{
  "domain": "somebusinessname.com",
  "published": true,
  "subdomain": "www",
  "theme_id": 24,
  "title": "Site Title Here",
  "user_id": 1
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created site object as JSON. See the [Get a single site](#get-a-single-site) section for an example Site object.

## Passing a `partner_user_id`

This is the unique user ID you use for this user internally (i.e. their login to your system or a customer ID). If you provide a `partner_user_id` in the params, you don't need to include `user_id` in your request.

In addition to supplying `partner_user_id`, unless you are certain that a User account has been created already on our side, you will need to also pass the user's details to us. These are `first_name`, `last_name`, and `email`. These fields are used to automatically create a User account on our side if it does not already exist. If you are not sure if a user account is already created for the supplied `partner_user_id`, then you can always pass these values to maintain consistency.

### Example of the `partner_user_id` params being used

```json
{
  "subdomain": "www"
  "domain": "somebusinessname.com",
  ...

  "partner_user_id": 12345,
  "first_name": "John",
  "last_name": "Doe",
  "email": "john.doe@gmail.com"
}
```


