# Images

Covered in this doc:
* [List images](#list-images)
* [Upload a new image (via an External URL)](#upload-a-new-image-via-an-external-url)
* [Upload a new image (via base64)](#upload-a-new-image-via-base64)

## List images

List all images uploaded within a Site

    GET /api/v2/images/?site_id=12345

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`string`|**required** ID of the `Site` you want to get the images for

### Response

```json
{
  "meta": {
    "limit": 20,
    "next": "/api/v2/images/?limit=20&offset=20",
    "offset": 0,
    "previous": null,
    "total_count": 5
  },
  "objects": [
    {
      "added": "2012-06-01T09:28:46",
      "height": 1400,
      "id": 1194687,
      "image": "img/upload/c1_26.jpg",
      "mimetype": "image/jpeg",
      "modified": "2012-06-01T09:28:46",
      "resource_uri": "/api/v2/images/1194687/",
      "site_id": 12345,
      "sizes": {
      	"big": "img/upload/c1_26.big.jpg",
      	"large": "img/upload/c1_26.large.jpg",
      	"medium": "img/upload/c1_26.medium.jpg",
      	"original": "img/upload/c1_26.jpg",
      	"small": "img/upload/c1_26.small.jpg",
      	"thumbnail": "img/upload/c1_26.thumbnail.jpg"
      },
      "user_id": 54321,
      "width": 1304
    },
    ...
  ]
}
```

### Full URI of images

Any image file is available publicly using the `image` parameter from the response and prefixing it with the frontend hostname of your API instance.

**Example:**

    http://yourprivatelabel.cloudfrontend.net/img/upload/c1_26.jpg
    
----

## Upload a new image (via an External URL)

    POST /api/v2/images/

### Parameters

Name | Type | Description
-----|------|--------------
`site_id`|`integer`|**required** Site to upload the image to
`external_url`|`string`|**required** Publicly accessible url for the image to be fetched by our system and uploaded

#### Example

```json
{
  "site_id": 12345,
  "external_url": "http://www.examples.com/full/path/to/image.jpg"
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created image object as JSON.

----

## Upload a new image (via base64)

    POST /api/v2/images/

### Parameters

Name | Type | Description
-----|------|--------------
`upload`|`object`|**required**


#### Example

```json
{
  "site_id": 12345,
  "upload": {
    "name": "image.jpg",
    "file": "iVBORw0KGgoAAAANSUhEUgAAASAAAABsCAIAAABFDPh0AAAAGXRFWHRTb2Z0d2F..."
  }
}
```

### Response

A status code of `201 created` is returned on a successful creation and contains the created image object as JSON.
