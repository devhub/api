# Domains

Covered in this doc:
* [Search available domains](#search-available-domains)
* [List domains](#list-domains)
* [Register a domain](#register-a-domain)
* [Renew a domain](#renew-a-domain)

## Search available domains

This method allows you search against registered domains using a keyword and see if they are available or already registered.

    GET /api/v2/domains/search/?keyword=somebusinessname

### Parameters

Name | Type | Description
-----|------|--------------
`keyword`|`string`|**required** This is the search query. It can accept a set of keywords (i.e. "some business name") or the actual domain desired (i.e. "somebusinessname.com")

### Response

```json
[
  {
    "available": false,
    "domain": "somebusinessname.com"
  },
  {
    "available": false,
    "domain": "somebusinessname.net"
  },
  {
    "available": true,
    "domain": "somebusinessname.org"
  }
]
```

## List domains

List all domains currently registered

    GET /api/v2/domains/

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/businesses/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 1039
  },
  "objects": [
    {
      "auto_renew": false,
      "expires": "2016-06-26",
      "id": 1401,
      "registered": "2013-06-26",
      "registrar": "namecom",
      "resource_uri": "/api/v2/domains/1401/",
      "sld": "somebusinessname",
      "tld": "com",
      "user_id": 248114,
      "whois_privacy": false,
      "whois_privacy_expires": null
    },
    ...
  ]
}
```

## Register a domain

Register a domain by providing the domain name as well as the registrant contact details (name, address, etc)

    POST /api/v2/domains/

### Parameters

Name | Type | Description
-----|------|--------------
`first_name`|`string`|**required** First name of domain owner
`last_name`|`string`|**required** Last name of domain owner
`address_1`|`string`|**required** Street address of domain owner
`city`|`string`|**required**
`state`|`string`|**required** Two character state/provence code
`zip`|`string`|**required**
`country`|`string`|**required** Two character country code (i.e. US, CA)
`phone`|`string`|**required** Contact phone number
`email`|`string`|**required** Contact email address
`period`|`integer`|**required** Number of years to register the domain
||
**Optional**||
`address_2`|`string`|Apt/unit number
`organization`|`string`|Name of the business/organization. Optional but required for `.org` domains

### Response

A status code of `201 created` is returned on a successful creation and contains the created domain object as JSON

## Renew a Domain

Renew a domain for a period of years.

    POST /api/v2/domains/:id/renew/

### Parameters

Name | Type | Description
-----|------|--------------
`period`|`integer`|**required** Number of additional years to renew the domain

### Response

A status code of `202 accepted` is returned on a successful renewal of the domain and contains the domain object as JSON
