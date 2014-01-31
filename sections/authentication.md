# Authentication

Authentication is done via oauth using the two legged approach. All requests sent to the API must be signed oauth requests using a provided oauth `key` and `secret` which is assigned to a particular partner or user.

## Endpoint

The endpoint for the API is based on your private label configuration. An example is:

    http://yourprivatelabel.cloudfrontend.net/api/v2/..

All endpoints respond with `JSON` unless otherwise specified by the format parameter

## Example oauth usage in python

### `GET` request

```python
import json
import oauth2 as oauth

consumer = oauth.Consumer('PROVIDEDKEYHERE', 'PROVIDEDSECRETHERE')
client = oauth.Client(consumer, None)
response, content = client.request('/api/v2/sites/', 'GET', headers={
    'Content-Type': 'application/json'
})
content = json.loads(content)
```

### `POST` request

A JSON object containing the parameters is encoded as a string and then passed as the request body.

```python
import json
import oauth2 as oauth

consumer = oauth.Consumer('PROVIDEDKEYHERE', 'PROVIDEDSECRETHERE')
client = oauth.Client(consumer, None)
params = {
    'domain': 'somebusinessname.com',
    ...
}
response, content = client.request('/api/v2/sites/', 'POST', body=json.dumps(params), headers={
    'Content-Type': 'application/json'
})
content = json.loads(content)
```