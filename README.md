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

3. **Set up your sqlite db**

```shell
cd database
```

```shell
touch database.sqlite
```

4. **Create a copy of the .env file**

```shell
cp .env.example .env
```

5. **Install composer dependencies**

```shell
composer install
```

6. **Generate a secure key for your application**

```shell
php artisan key:generate
```

7. **Run the migrations**

```shell
php artisan migrate
```

8. **Start your web server**

```shell
php artisan serve
```

9. **Access the application**

Navigate to http://localhost:8000 (or the URL specified in the artisan serve command)
