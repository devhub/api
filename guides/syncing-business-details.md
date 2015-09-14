## Syncing Business Details

Using our Business and Location APIs, keep customer information up to date on published Websites, Landing Pages, and Location Finders.

We provide two fields to allow you to map IDs. `Business.partner_business_id` and `Location.partner_location_id`

Upon a user editing their contact information within your portal or dashboard, you can query to update the details over the API.

* Retrieve the locations for the Business `GET /api/v2/locations/?partner_business_id=12345`
* Update the fields that have changed: `PUT /api/v2/locations/54321/`

After the API call is done, any products on our side associated with that Location or Business will be reflected within 2-3 minutes.
