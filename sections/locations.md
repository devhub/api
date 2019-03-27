# Locations

## Locations

The Locations resource is the primary way our system stores structured information about a Business location. It is a sub-resource of "Business" and also one or multiple locations can be assigned to a Site.

## Location Model

### Location object

A location object contains the following fields

| Attribute | Type | Description |
| :--- | :--- | :--- |
| id | integer | unique id of the location |
| business\_id | integer | Reference id to the Business this location is under |
| user\_id | integer | Reference id to the User that created this business |
| location\_name | string | Name of this location to identify different locations within a single Business |
| street | string | Street address |
| street2 | string | Apartment or unit number |
| city | string | City |
| state | string | State code |
| country | string | 2 character country code  |
| postal\_code | string | Postal / zip code |
| neighborhood | string | Neighborhood |
| phones | list | Nested list of [Phone objects](locations.md#phone-object) |
| description | string | HTML-formatted business description |
| partner\_location\_id | string | Unique ID reference to partner IDs |
| hours\_of\_operation | list | Formatted JSON representing hours of operation. More details [here](locations.md#hours-of-operation) |
| hours\_of\_operation\_notes | string | Used for holiday closures, open of appointment only or other notes related to their hours |
| contact\_email | string | Default contact email for the business. Also used as the default recipient on forms |
| payment\_forms | list | List of forms of payment accepted |
| payment\_forms\_notes | string | Additional payment forms or notes |
| price\_range | integer | Price range indicated by `1-4` and used to represent `$-$$$$` |
| private\_street | string | Street address but used for service area businesses. This field will not be displayed by default on maps or within templates |
| service\_area\_only | boolean | Toggle to set this location as a "service-area only" business |
| service\_areas | string | Location service areas - neighborhoods, cities, zip codes |
| tagline | string | Tagline or main headline for the location |
| year\_opened | integer | Year opened |
| facebook\_url | string | Full url link to their Facebook page |
| gplus\_url | string | Full url link to their Google plus page |
| homepage\_url | string | Full url link to their external website if applicable |
| instagram\_url | string | Full url link to their Instagram profile |
| linkedin\_url | string | Full url link to their LinkedIn profile |
| pinterest\_url | string | Full url link to their Pinterest page |
| twitter\_url | string | Full url link to their Twitter profile |
| yelp\_url | string | Full url link to their Yelp profile |
| youtube\_url | string | Full url link to their Youtube page |
| added | timestamp | Date and time location was created |
| modified | timestamp | Date and time location was modified |
| automatic\_latlon | boolean | If true, we will automatically geocode the address and set the `lat` and `lon` fields |
| lat | float | Latitude coordinate |
| lon | float | Longitude coordinate |
| location\_url | string | Full url link to the location page associated with this location. This is used by our Store Locator module |

#### Example object:

```javascript
{
    "added": "2012-12-19T15:27:59",
    "automatic_latlon": true,
    "business_id": 12345,
    "city": "Seattle",
    "contact_email": "contact@ourdomain.com",
    "country": "US",
    "country_name": "United States of America",
    "description": "<p>This is a business description</p>",
    "facebook_url": "http://www.facebook.com/mypage/",
    "formatted_address": "555 Main St, Seattle, WA 98109",
    "geocoded": "555 Main St, Seattle, WA 98109, USA",
    "gplus_url": null,
    "homepage_url": "",
    "hours_of_operation": [
        [["09:00:00", "17:00:00"]],
        [["09:00:00", "17:00:00"]],
        [["09:00:00", "17:00:00"]],
        [["09:00:00", "17:00:00"]],
        [["09:00:00", "17:00:00"]],
        [],
        []
    ],
    "hours_of_operation_notes": "Open on saturday by appointment only",
    "id": 1234,
    "instagram_url": null,
    "lat": "47.65015390000000",
    "linkedin_url": null,
    "location_name": "Belltown",
    "location_url": null,
    "lon": "-122.37786910000000",
    "modified": "2012-12-19T15:34:32",
    "neighborhood": "Queen Anne",
    "partner_location_id": "location-12345",
    "payment_forms": [],
    "payment_forms_notes": null,
    "phonemap": {
        "phone": "(206) 930-7689"
    },
    "phonemap_e164": {
        "phone": "(206) 930-7689"
    },
    "phones": [
        {
            "disable_autoformat": false,
            "e164": "(206) 930-7689",
            "extension": null,
            "id": 4321,
            "location_id": 1234,
            "number": "(206) 930-7689",
            "resource_uri": "/api/v2/phones/4321/",
            "type": "phone"
        }
    ],
    "pinterest_url": null,
    "postal_code": "98109",
    "price_range": 3,
    "private_street": null,
    "resource_uri": "/api/v2/locations/1234/",
    "service_area_only": false,
    "service_areas": "Belltown, Downtown, South Lake Union",
    "state": "WA",
    "state_name": "Washington",
    "street": "555 Main St",
    "street2": "Apt 555",
    "tagline": null,
    "twitter_url": "https://twitter.com/mypage/",
    "user_id": 123,
    "year_opened": null,
    "yelp_url": null,
    "youtube_url": null
}
```

### Phone object

A phone object contains the following fields

| Attribute | Type | Description |
| :--- | :--- | :--- |
| id | integer | unique id of the phone |
| location\_id | integer | Reference id to the Location this phone is under |
| type | string | type of the phone - options are `phone` `secondary` `tollfree` `fax` |
| number | string | Formatted version of the phone number |
| extension | string | Extension of the phone |

### Hours of operation

Except for the special case formatting, this object is a list of 7 items which represent each day.

Each day can can have one or two time ranges. Two time ranges denotes a "lunch-break". No time ranges denotes closed.

* 9am-5pm `[["09:00:00", "17:00:00"]]`
* 9am-12pm and 1pm-5pm `[["09:00:00", "12:00:00"], ["13:00:00", "17:00:00"]]`
* Closed - send an empty list `[]`

#### Special case formatting

* 24 hours, for every day
  * `"hours_of_operation": ["24_HOURS"]`

## Create a location

`POST /api/v2/locations/`

### Required fields - Normal location

| Attribute |
| :--- |
| business\_id |
| street |
| city |
| state |
| postal\_code |
| country |

### Required fields - Service area only location

| Attribute |
| :--- |
| business\_id |
| city |
| state |
| postal\_code |
| country |

## Update a location

`PUT /api/v2/locations/:location_id/`

## Delete a location

`DELETE /api/v2/locations/:location_id/`

