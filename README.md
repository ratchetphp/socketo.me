## Installation/Setup

This is a bit messy, if you're good at cleaning it up, please submit a PR!

Steps to get the site running:
* Run `cp .htaccess.example .htaccess` and replace "socketo.me" with what ever your local URL is for the site
* Run `composer.phar install` in the repository directory
* Run `cd web && composer.phar`

This is assuming you're using Apache.  The .htaccess is re-writing to ignore the root directory and look at /web as the root. 
For this reason, we have 2 composer installs.  The first is for the PHP libs (Silex) and the second is for JavaScript libraries.

## Documentation

All the documentation files are located in /views using the twig format.  Create/Edit them and submit PRs!