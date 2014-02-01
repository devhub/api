# Businesses

Covered in this doc:
* [List businesses](#list-businesses)
* [Get a single business](#get-a-single-business)
* [Create a business](#create-a-business)
* [Updating a business](#updating-a-business)

## List businesses

List all business including active and deleted

    GET /api/v2/businesses/

List all active businesses

	GET /api/v2/businesses/?deleted=0

### Parameters

Name | Type | Description
-----|------|--------------
`added__date`|`string`|Filter for businesses created on a particular date in `YYYY-MM-DD` format
`order_by`|`string`|Set the field to sort the results by. Available `order_by` includes `id` (default) and `business_name`. You can also sort decending by prefixing the field with a minus sign (i.e. `order_by=-id`)
`partner_business_id`|`string`|Used to lookup/search for businesses matching a particular internal id

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
      "added": "2013-05-24T11:40:21",
      "business_name": "Some Business Name",
      "category_id": null,
      "contact_email": "contact@somebusiness.com",
      "deleted": false,
      "description":"<p>Here is a description of the business</p>",
      "facebook_url": "http://www.facebook.com/ourpage",
      "gplus_url": null,
      "homepage_url": "http://www.somebusiness.com",
      "id": 24305,
      "modified": "2014-01-21T10:37:39",
      "partner_business_id": null,
      "partner_sub_id": null,
      "payment_forms": ["visa", "mastercard", "american-express"],
      "payment_forms_notes": null,
      "resource_uri": "/api/v2/businesses/24305/",
      "slug": "some-business-name",
      "tagline": "Best business in the region",
      "twitter_url": "http://twitter.com/somebusiness",
      "user_id": 142606,
      "year_opened": 2013,
      "yelp_url": null
    },
    {
      "added": "2013-05-24T11:40:21",
      "business_name": "Another Business Name",
      "category_id": null,
      "contact_email": "anotherbusiness@gmail.com",
      "deleted": false,
      "description":"<p>Here is a description of the business</p>",
      "facebook_url": "http://www.facebook.com/anotherbusiness",
      "gplus_url": null,
      "homepage_url": "http://www.anotherbusiness.com",
      "id": 24306,
      "modified": "2014-01-21T10:37:39",
      "partner_business_id": null,
      "partner_sub_id": null,
      "payment_forms": ["cash", "checks"],
      "payment_forms_notes": null,
      "resource_uri": "/api/v2/businesses/24306/",
      "slug": "another-business-name",
      "tagline": "Best business in the region",
      "twitter_url": "http://twitter.com/anotherbusiness",
      "user_id": 142606,
      "year_opened": 1999,
      "yelp_url": null
    },
    ...
  ]
}
```

## Get a single business

Fetch the Business detail using the `Business.id`

    GET /api/v2/businesses/:id/

### Response

```json
{
  "added": "2013-05-24T11:40:21",
  "business_name": "Some Business Name",
  "category": null,
  "category_id": null,
  "contact_email": "contact@somebusiness.com",
  "deleted": false,
  "description":"<p>Here is a description of the business</p>",
  "facebook_url": "http://www.facebook.com/ourpage",
  "gplus_url": null,
  "homepage_url": "http://www.somebusiness.com",
  "id": 24305,
  "images": [
    ... list of the `Image` objects associated with the Business
  ],
  "logo_image": {
    ... fully expanded `Image` object for the Business' logo
  },
  "logo_image_id": 12345,
  "modified": "2014-01-21T10:37:39",
  "partner_business_id": null,
  "partner_sub_id": null,
  "payment_forms": ["visa", "mastercard", "american-express"],
  "payment_forms_notes": null,
  "resource_uri": "/api/v2/businesses/24305/",
  "services": [
    ... list of business `Service` objects
  ],
  "slug": "some-business-name",
  "tagline": "Best business in the region",
  "twitter_url": "http://twitter.com/somebusiness",
  "user_id": 142606,
  "year_opened": 2013,
  "yelp_url": null
}
```

## Create a business

    POST /api/v2/businesses/

### Parameters

Name | Type | Description
-----|------|--------------
`business_name`|`string`|**required** Name of the Business
||
**Optional**||
`contact_email`|`string`|Contact email address for the Business
`description`|`string`|This is a text summary describing the business, formatted as HTML
`facebook_url`|`string`|Full address of the Business' Facebook Page (i.e. `http://www.facebook.com/somepage`)

#### Example

```json
{
  "business_name": "Example Business",
  "partner_business_id": "uid-12347",
  "locations": [
    {
      "street": "555 Main St",
      "city": "Seattle",
      "state": "WA",
      "postal_code": "98121",
      "country": "US",
      "phones": [
        {
          "type": "phone",
          "number": "206-555-5555"
        }
      ]
    }
  ]
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created business object as JSON. See the [Get a single business](#get-a-single-business) section for an example Business object.

## Updating a business

    PUT /api/v2/business/:id/

You can `PUT` a partial or full object to the detail endpoint to update/change values on the Business object. If using a partial object, you must insure that the primary business `id` is part of the payload.