# Lorem Ipsum Generator API

This repo is the code that powers the API I recently added to Mashape.com, the API marketplace.  I just wanted to share as an example of a super simple API that's leveraging a lot of awesome open source software.

## Installation

#### Requirements
- Apache
- PHP 5.3.3+
- cURL
- composer

#### Command Line
```
git clone https://github.com/montanaflynn/lorem-ipsum-api.git
cd lorem-ipsum-api
composer install
```
#### Troubleshooting
If your getting a 404 error, it's probably because you installed this in a directory outside the web root, if thats the case just uncomment the RewriteBase line in the .htaccess file and make sure it matches your path.

## Usage
Documentation is provided on Mashape here: https://www.mashape.com/montanaflynn/lorem-text-generator#documentation


## Credits
Composer, Slim, Faker are the three main components that make this API.  All I did was make them all work together.
