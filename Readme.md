# YottaCMS Php Settings Bundle

An easy way to set the php.ini settings in Symfony 4

## Installation
```Bash
composer require yottacms/yotta-phpsettings-bundle
```
```PHP    
// config/bundles.php
// ...
return [
    \YottaCms\Bundle\YottaPhpSettingsBundle\YottaPhpSettingsBundle::class => ['all' => true],
    // ...
];
```
```YAML
# config/packages/yotta.yml
yotta_php_settings:
    ini:
        - {"date.timezone": "Europe/Minsk"}
```
