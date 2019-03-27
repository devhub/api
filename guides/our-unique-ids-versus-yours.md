# Our unique IDs versus yours

There are two methods you can use to map your Businesses, Locations and Sites to us.

## 1\) References to our object IDs

The default integration flow is to store references to each of our object `id` values as they are created, and then use those `id` values in future updates over the API.

## 2\) You can use our "Partner ID" fields

We have `partner_<object>_id` fields on each object that can be used to map the unique IDs from your system to our objects.

If you want to use only these IDs in your workflow it adds a few more steps to retrieve our `id` values during publishing. Here is an example of our `location` object.

1. Search for an existing object under that ID `/api/v2/locations/?partner_location_id=6323689`
2. If an object is found, use the `id` field from that object in your updates
3. If no object is found, you can create a new object and set the `partner_location_id` field so that you can find that object later.

