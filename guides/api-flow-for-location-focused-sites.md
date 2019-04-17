---
description: >-
  Example of how to integrate our API for publishing a Site dedicated to a
  particular Business and one of their many Locations
---

# API flow for location-focused sites

The basic flow is:

1. Create or update a Location under a Business
2. Create or update a Site under that Business/Location

## Example endpoints that would be hit

### New location and site

* `POST /api/v2/locations/`
  * `"business_id": 12345` - Passing the shared `business_id` associated with all locations
* `POST /api/v2/sites/`
  * `"business_id": 12345` - Passing the `business_id` from above
  * `"locations": [54321]` - Passing the `location_id` from above

### Existing location and site

* `PUT /api/v2/locations/:location_id/`
  * `"business_id": 12345` - Passing the shared `business_id` associated with all locations
* `PUT /api/v2/sites/:site_id/`
  * `"business_id": 12345` - Passing the `business_id` from above
  * `"locations": [54321]` - Passing the `location_id` from above

