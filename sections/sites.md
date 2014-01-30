# Sites

## List sites

List all sites including active, deleted, non-published and published

    GET /api/v2/sites/

List all active sites

	GET /api/v2/sites/?deleted=0

### Parameters

Name | Type | Description
-----|------|--------------
`business_id`|`string`|Filter to sites associated with a particular `Business`
`deleted`|`string`|Return sites based on if they are active (`0`) or deleted/disabled (`1`)
`location_id`|`string`|Filter to sites associated with a particular `Location`
