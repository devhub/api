# Pages

Covered in this doc:
* [List pages](#list-pages)
* [Get a single page](#get-a-single-page)
* [Create a page](#create-a-page)
* [Updating a page](#updating-a-page)

## List pages

List all pages within a Site

    GET /api/v2/pages/?site_id=12345

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`string`|**required** ID of the `Site` you want to get the pages for

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/pages/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 5
  },
  "objects": [
    {
      "active": true,
      "id": 22225773,
      "name": "Home",
      "nofollow": false,
      "path": "/",
      "pattern": "^$",
      "resource_uri": "/api/v2/pages/22225773/",
      "site_id": 12345,
      "type": "default"
    },
    {
      "active": true,
      "id": 22225774,
      "name": "Contact Us",
      "nofollow": false,
      "path": "/contact-us/",
      "pattern": "^contact-us/$",
      "resource_uri": "/api/v2/pages/22225774/",
      "site_id": 12345,
      "type": "default"
    },
    ...
  ]
}
```

## Get a single page

Fetch the Page detail using the `Page.id`

    GET /api/v2/pages/:id/


