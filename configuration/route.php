<?php 

# Here we can configure our routes 

# By default you have a php extension, but if you will 
# want to display your routes in routes.yml or routes.json
# file you can set a "json" or "yaml" extension

$extension = [
    "extension_name" => "yml"
];

# Route parameters which will be use for flexible route
# parameters manipulations. If you will to set own pattern,
# you can make it like this "{key}" => "regular expression pattern"

$route_parameters = [
    "{id}" => "([0-9]+)"
];