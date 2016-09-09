# Proxies

Covered in this doc:
* [List proxies](#list-proxies)
* [Get a single proxy](#get-a-single-proxy)
* [Create a proxy](#create-a-proxy)
* [Passing a partner_user_id](#passing-a-partner_user_id)
* [Updating a proxy](#updating-a-proxy)
* [Disabling / enabling a proxy](#disabling--enabling-a-proxy)

## List proxies

List all proxies including active, deleted, non-published and published

    GET /api/v2/proxies/

List all active proxies

	GET /api/v2/proxies/?deleted=0

### Parameters

Name | Type | Description
-----|------|--------------
`business_id`|`string`|Filter for proxies associated with a particular `Business`
`deleted`|`string`|Return proxies based on if they are active (`0`) or deleted/disabled (`1`)
`partner_proxy_id`|`string`|Used to lookup/search for proxies matching a particular internal id

### Response

```json
{
  "meta":{
    "limit":20,
    "next":null,
    "offset":0,
    "previous":null,
    "total_count":1
  },
  "objects":[
    {
      "added": "2016-07-26T19:39:18",
      "autolink": false,
      "base_directory": "/",
      "business_id": 24305,
      "country": "US",
      "deleted": false,
      "domain": "someproxy.cloudbackend.net",
      "extra_css": null,
      "footer_code": null,
      "header_code": null,
      "https": false,
      "id": 12345,
      "modified": "2016-07-26T19:39:18",
      "partner_proxy_id": null,
      "phone": "(206) 555-5555",
      "replace_patterns": [],
      "resource_uri": "/api/v2/proxies/12345/",
      "source_domain": "http://www.example.com",
      "theme_settings": {},
      "user_id": 123
    },
    {
      "added": "2016-07-26T19:39:18",
      "autolink": false,
      "base_directory": "/",
      "business_id": 24305,
      "country": "US",
      "deleted": false,
      "domain": "anotherproxy.cloudbackend.net",
      "extra_css": null,
      "footer_code": null,
      "header_code": null,
      "https": false,
      "id": 12346,
      "modified": "2016-07-26T19:39:18",
      "partner_proxy_id": null,
      "phone": "(206) 555-5555",
      "replace_patterns": [],
      "resource_uri": "/api/v2/proxies/12346/",
      "source_domain": "http://www.example.com",
      "theme_settings": {},
      "user_id": 123
    },
    ...
  ]
}
```

## Get a single proxy

Fetch the Proxy detail using the `Proxy.id`

    GET /api/v2/proxies/:id/

### Response

```json
{
  "added": "2016-07-26T19:39:18",
  "autolink": false,
  "base_directory": "/",
  "business": {
    ... fully expanded `Business` object
  },
  "business_id": 24305,
  "country": "US",
  "deleted": false,
  "domain": "someproxy.cloudbackend.net",
  "extra_css": null,
  "footer_code": null,
  "header_code": null,
  "https": false,
  "id": 12345,
  "modified": "2016-07-26T19:39:18",
  "partner_proxy_id": null,
  "phone": "(206) 555-5555",
  "replace_patterns": [],
  "resource_uri": "/api/v2/proxies/12345/",
  "source_domain": "http://www.example.com",
  "theme_settings": {},
  "user_id": 123
}
```

## Create a proxy

    POST /api/v2/proxies/

### Parameters

Name | Type | Description
-----|------|--------------
`domain`|`string`|**required**
`source_domain`|`string`|**required** Full URL of the source site (i.e. http://www.example.com). Supports `http` and `https` schemas
`user_id` or `partner_user_id`|`integer` or `string`|**required** If you know the user account you want to publish this proxy on the behalf of, use `user_id`. If you don't know the user ID, you can use the `partner_user_id` method described further down this document.
||
**Optional**||
`base_directory`|`string`|Under private labels with sub-directory based proxies, this is where it is defined (defaults to slash `/` but an example might be `/some-page/`)
#### Example

```json
{
  "domain": "someproxy.cloudbackend.net",
  "source_domain": "http://www.example.com",
  "user_id": 1
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created proxy object as JSON. See the [Get a single proxy](#get-a-single-proxy) section for an example Proxy object.

## Updating a proxy

    PUT /api/v2/proxies/:id/

You can `PUT` a partial or full object to the detail endpoint to update/change values on the Proxy object. If using a partial object, you must insure that the primary proxy `id` is part of the payload.

## Disabling / enabling a proxy

### Disabling a proxy

To disable an active proxy and clear all cache references to the domain, use the `DELETE` method on the Proxy detail endpoint.

    DELETE /api/v2/proxies/:id/
    
### Enabling a proxy

To enable a currently disabled proxy, you will set the param for `deleted` to `False` using the [Proxy update endpoint](#updating-a-proxy).
