# URL SHORTENER

## Overview

A simple php project to shorten long URLs, to make it easier to share and manage

![Screenshot of the landing page](/landingpagess.jpeg)

## Features

- Shorten long URLs into short and manageable versions
- Redirect users from the shortened URLs to the original long URLs

## Installation

To run this project, follow these steps:

1. **Clone the repository**

```shell
git clone https://github.com/cedricahenkorah/url-shortener.git
```

2. **Navigate to the project directory**

```shell
cd url-shortener
```

3. **Set up your sql db and config.php**

   Configure the db in the config.php

```shell
<?php

return $config = [
    'database' => [
        'host' => '',
        'port' => ,
        'dbname' => '',
        'charset' => ''
    ]
];

```

4. **Start your web server**

```shell
php -S localhost:[portnumber]
```
