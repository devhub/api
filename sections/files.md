# Files

Covered in this doc:
* [List files](#list-files)
* [Upload a new files (via base64)](#upload-a-new-files-via-base64)

## List files

List all files uploaded within a Site

    GET /api/v2/files/

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/files/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 5
  },
  "objects": [
    {
      "added": "2014-07-18T12:05:44",
      "checksum": "c8aaa5d3656fd6967b4826a14d3c86ef",
      "filename": "chart-copy.pdf",
      "filesize": 54226,
      "id": 13,
      "mimetype": "application/pdf",
      "modified": "2014-07-18T12:05:44",
      "path": null,
      "resource_uri": "/api/v2/files/13/",
      "site_id": 1556341,
      "upload_source": "builder",
      "user_id": 322,
      "whitelabel_id": 10
    },
    ...
  ]
}
```

### Full URI of files

Any files file is available publicly using the `filename` parameter from the response and prefixing it with the frontend hostname of your API instance or path to a hosted site

**Example:**

    http://yourprivatelabel.cloudfrontend.net/files/chart-copy.pdf
    
----

## Upload a new file (via base64)

    POST /api/v2/files/

### Parameters

Name | Type | Description
-----|------|--------------
`upload`|`object`|**required**


#### Example

```json
{
  "upload": {
    "name": "chart-copy.pdf",
    "file": "iVBORw0KGgoAAAANSUhEUgAAASAAAABsCAIAAABFDPh0AAAAGXRFWHRTb2Z0d2F..."
  }
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created files object as JSON.
