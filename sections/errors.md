# Errors

Our API uses conventional HTTP response codes to indicate success or failure of an API request. In general, codes in the `2xx` range indicate success, codes in the `4xx` range indicate an error that resulted from the provided information (e.g. a required parameter was missing, validation errors, etc.), and codes in the `5xx` range indicate an actual error with our servers.

## HTTP Status Code Summary

Status code | Description
-----|--------------
`200` OK|Everything worked as expected
`400` Bad Request|Often missing a required parameter or validation of a supplied parameter has failed
`401` Unauthorized|The oauth parameters provided to not have permission for this resource
`402` Request Failed|Parameters were valid but request failed
`404` Not Found|The requested item does not exist
`500, 502, 503, 504` Server errors|Something went wrong on our end

### Error/validation responses

Returned as status `400 Bad Request` on `POST` or `PUT` requests

```json
{"__all__": ["The provided error is related to the object as a whole"]}
```

```json
{"some_field": ["This field is required"]}
```

```json
{"nested_field": {"nested_field-1": {"some_field": ["This field is required"]}}}
```