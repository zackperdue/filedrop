# Filedrop - Web File Management like a Mac

1. step: Include in Bootstrap (duh) and Update Routes
================================================================

By default and for convenience of testing, filedrop will load as a public route at 
http://yoursite.com/filedrop however, you're most likely not going to want open, unfiltered
uploads to your server, so we recommend changing the routes and access to the module and putting
it immediately behind some kind of auth, otherwise you will be leaving the most desireable
exploit in your website's security.
 
2. step: Update Config Settings
================================================================

You'll want to update the server path and allowed file types 