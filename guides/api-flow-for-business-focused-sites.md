---
description: >-
  Example of how to integrate our API for publishing a Site dedicated to a
  particular Business and their single Location
---

# API flow for business-focused sites

The basic flow is:

1. Create or update a Business
2. Create or update a Location under that Business
3. Create or update a Site under that Business/Location

## Example endpoints that would be hit

### New business, location and site

* `POST /api/v2/business/`
* `POST /api/v2/locations/`
  * `"business_id": 12345` - Passing the `business_id` from above
* `POST /api/v2/sites/`
  * `"business_id": 12345` - Passing the `business_id` from above
  * `"locations": [54321]` - Passing the `location_id` from above

### Existing business, location and site

* `PUT /api/v2/businesses/:business_id/`
* `PUT /api/v2/locations/:location_id/`
  * `"business_id": 12345` - Passing the `business_id` from above
* `PUT /api/v2/sites/:site_id/`
  * `"business_id": 12345` - Passing the `business_id` from above
  * `"locations": [54321]` - Passing the `location_id` from above

