# Relevant Jobs

## Installation

```
git clone git@github.com:doberbeatz/relevantmedia.git
cd ./relevantmedia
composer install
php artisan migrate --seed
```

## Usage

### Admin
After migrate you got admin account

- **Login**: admin@example.com
- **Password**: 123456

### Captcha

Setup your **.env** file

CAPTCHA_TYPE=pictures|text

- **pictures** - Select a appropriate picture
- **text** - Type text from picture

### Mail

You got to config Mail credentials in **.env** for access Mailer
