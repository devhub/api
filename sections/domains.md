# Domains

Covered in this doc:
* [Search available domains](#search-available-domains)
* [List domains](#list-domains)
* [Register a domain](#register-a-domain)

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