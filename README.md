# Filedrop - Web File Management like a Mac

With this module you can upload files with HTML5 and JS fallback and store the data in a user record
using Mango (for now) and [MongoDB](http://www.mongodb.org/).

Include in Bootstrap (duh) and Update Routes
============================================

By default and for convenience of testing, filedrop will load as a public route at 
http://yoursite.com/filedrop however, you are most likely not going to want open, unfiltered
uploads to your server, so we recommend changing the routes and access to the module and putting
it immediately behind some kind of auth, otherwise you will be leaving the most desireable
exploit in your website's security.
 
Update Config Settings
============================================

You'll want to update the server path and allowed file types 