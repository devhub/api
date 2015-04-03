# Modules

Covered in this doc:
* [Text & Forms](#text--forms)
* [Images & Video](#images--video)
* [Business Details](#business-details)
* [Social](#social)
* [Blogging](#blogging)
* [Shop/Ecommerce](#shopecommerce)
* [Advanced](#advanced)

----

## Text & Forms

### Content Editor

`module`: `content`

**Properties**

Name | Type | Description
-----|------|--------------
`content`|`string`|**required**

### About

`module`: `about`

**Properties**: `None`

### Contact Form

`module`: `contactform`

**Properties**: `None`

### Form Builder

`module`: `formbuilder`

**Properties**

Name | Type | Description
-----|------|--------------
`form_id`|`integer`|**required**
`hide_form_name`|`boolean`|Hide the form name from the top of the module. Default `true`

----

## Images & Video

### Video

`module`: `video`

**Properties**

Name | Type | Description
-----|------|--------------
`video_id`|`integer`|**required**
`disable_related`|`boolean`|Disable the related videos that show after a video has completed playing. Default `false`
`disable_title`|`boolean`|Disable the video title from showing within the video frame. Default `false`

### Image

`module`: `image`

**Properties**

Name | Type | Description
-----|------|--------------
`image_id`|`integer`|**required**
`alt`|`string`|`alt` tag text for the image
`link_url`|`string`|Link to follow when the image is clicked
`width`|`integer`|Manually set width for the image in pixels
`alignment`|`string`|`left`, `center`, or `right`

### Gallery

`module`: `gallery`

**Properties**

Name | Type | Description
-----|------|--------------
`gallery_id`|`integer`|**required**

### Carousel

`module`: `carousel`

**Properties**

Name | Type | Description
-----|------|--------------
`gallery_id`|`integer`|**required**

### Coupon

`module`: `coupon`

**Properties**

Name | Type | Description
-----|------|--------------
`image_id`|`integer`|**required**

----

## Business Details

### Contact Info

`module`: `contactinfo`

**Properties**: `None`

### Hours of Operation

`module`: `hoursofoperation`

**Properties**

Name | Type | Description
-----|------|--------------
`hide_closed_days`|`boolean`|Default `false`
`group_days`|`boolean`|Group Days with Similar Hours. Default `false`

### Forms of Payment

`module`: `paymentforms`

**Properties**: `None`

### Google Map

`module`: `googlemaps`

If no `location_$i`'s are set, it will use the address associated with the Location assigned to the Site

**Properties**

Name | Type | Description
-----|------|--------------
`location_$i`|`string`|String representations of locations (points) to show on the map. Maximum 15 locations

----

## Social

### ShareThis

`module`: `sharethis`

**Properties**

Name | Type | Description
-----|------|--------------
`align`|`string`|`left`, `center`, or `right`

### Social Icons

`module`: `sociallinks`

**Properties**

Name | Type | Description
-----|------|--------------
`align`|`string`|`left`, `center`, or `right`

### YouTube Channel

`module`: `youtube`

**Properties**

Name | Type | Description
-----|------|--------------
`num_items`|`integer`|Number of videos to show

### Facebook

`module`: `facebook`

**Properties**: `None`

### Flickr

`module`: `flickruser`

**Properties**

Name | Type | Description
-----|------|--------------
`username`|`string`|**required** Flickr username

----

## Blogging

### Recent Posts

`module`: `blogrecentposts`

**Properties**

Name | Type | Description
-----|------|--------------
`category_slug`|`string`|Filter the recent posts by a blog category

### Date Archives

`module`: `blogarchives`

**Properties**: `None`

### Category List

`module`: `blogcategories`

**Properties**: `None`

### Full Posts

`module`: `blogposts`

**Properties**

Name | Type | Description
-----|------|--------------
`category_slug`|`string`|Filter the recent posts by a blog category

----

## Shop/Ecommerce

### Shop by Category

`module`: `shopbycategory`

**Properties**

Name | Type | Description
-----|------|--------------
`category_slug`|`string`|Filter the products by a shop category

### Featured Product

`module`: `shopfeaturedproduct`

**Properties**

Name | Type | Description
-----|------|--------------
`product_id`|`integer`|**required**

### Category List

`module`: `shopcategories`

**Properties**: `None`

----

## Advanced

### HTML Code

`module`: `embed`

**Properties**

Name | Type | Description
-----|------|--------------
`content`|`string`|**required**

### Multi Location

`module`: `multilocation`

**Properties**: `None`
