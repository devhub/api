# Analytics

## Site Summary

Summary of all events within a date range for a particular `site_id`

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`string`|**required** ID of the `Site` you want to get the report for
`report_type`|`string`|**required** Example: `full_report`
`from_date`|`string`|**required** `YYYY-MM-DD` formatted date string
`to_date`|`string`|**required** `YYYY-MM-DD` formatted date string

### Response

```json
{
  "events": {
    "site-page-view": {
      "average": "0.00",
      "timeline": {
        "2015-07-01": 0,
        "2015-07-02": 0,
        "2015-07-03": 0,
        "2015-07-04": 0,
        "2015-07-05": 0
      },
      "total": "0"
    },
    ...
  },
  "meta": {
    "events": [
      "form-submit",
      "link-outgoing",
      "site-page-view",
      ...
    ],
    "series": [
      "2015-07-01",
      "2015-07-02",
      "2015-07-03",
      "2015-07-04",
      "2015-07-05"
    ]
  }
}
```
