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

### Response

```json
{
  "site_id": "12345",
  "path": "/",
  "title": "Site Home Page",
  "name": "Home",
  "column_widths": [[50, 50]],
  "modules": [
    {
      "module": "contact_info",
      "column": 1,
      "order": 1,
      "row": 1
    },
    {
      "module": "content",
      "column": 2,
      "order": 1,
      "row": 1,
      "content": "<h1>Here is some content</h1><p>You can even access site meta data like ${business_name} and ${city}</p>"
    },
    {
      "module": "googlemaps",
      "column": 2,
      "order": 2,
      "row": 1
    },
    {
      "module": "about",
      "column": 2,
      "order": 3,
      "row": 1
    }
  ]
}
```

## Create a page

    POST /api/v2/pages/

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`integer`|**required**
`name`|`string`|**required** Name of the page. Used in navigation menus and buttons
||
**Optional**||
`column_widths`|`list` of `list`s|Percentage widths of the rows and columns within the Page. Examples: Single column page `[[100]]` *(default)*, Two columns within one row `[[50, 50]]`, Multiple rows and columns `[[100], [50, 50]]`
`modules`|`list`|List of Page Module objects to publish to the Page with positional details including `row`, `column`, and `order`
`path`|`string`|Specific path within the Site where you want to publish the page (i.e. `/contact-us/`)
`title`|`string`|HTML `<title>` tag for the Page. Defaults to the `name` parameter

#### Example

```json
{
  "name": "Our Services",
  "path": "/our-services/",
  "site_id": 12345
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created page object as JSON. See the [Get a single page](#get-a-single-page) section for an example Page object.

## Update a page

    PUT /api/v2/pages/:id/

You can `PUT` a partial or full object to the detail endpoint to update/change values on the Page object. If using a partial object, you must insure that the primary page `id` is part of the payload.

