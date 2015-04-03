# Contact logs

Covered in this doc:
* [List contact logs](#list-contact-logs)

## List contact logs

List all contact form logs for a site

    GET /api/v2/contact_log/?site_id=12345

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`string`|ID of the `Site` you want to get the logs for
`order_by`|`string`|Set the field to sort the results by. Available `order_by` includes `id` (default). You can also sort decending by prefixing the field with a minus sign (i.e. `order_by=-id`)
`id__gt`|`string`|Filter the list to only the contact logs greater than a certain contact log ID

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/contact_log/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 5
  },
  "objects": [
    {
      "email": "example@example.com",
      "id": 328269,
      "ip": "187.232.189.217",
      "message": "Here is the message from the visitor",
      "name": "John Doe",
      "phone": "206-555-5555",
      "resource_uri": "/api/v2/contact_log/328269/",
      "site_id": 12345,
      "timestamp": "2012-06-01T09:28:46"
    },
    ...
  ]
}
```
