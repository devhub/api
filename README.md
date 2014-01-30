API v2 Documentation
===

This is a REST-style API that uses JSON for serialization and OAuth 2 for authentication.

Making a request
----------------

All URLs are prefixed with `/api/v2/`

Authentication
--------------

Read the [authentication guide](https://github.com/devhub/api/blob/master/sections/authentication.md) to get started.

No XML, just JSON
-----------------

We only support JSON for serialization of data. You have to send `Content-Type: application/json;" when you're POSTing or PUTing data to the API

APIs ready for use
-----------------

* [Businesses](https://github.com/devhub/api/blob/master/sections/businesses.md)
* [Domains](https://github.com/devhub/api/blob/master/sections/domains.md)
* [Sites](https://github.com/devhub/api/blob/master/sections/sites.md)

Help us make it better
----------------------

Please tell us how we can make the API better. If you have a specific feature request or if you found a bug, please use GitHub issues. Fork these docs and send a pull request with improvements.