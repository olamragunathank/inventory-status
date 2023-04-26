# [Magento 2 StockStatus Extension](https://www.mindsprint.org/) by Mindsprint

[![Total Downloads](https://github.com/olamragunathank/inventory-status)

This module is required for other Mindsprint extensions for Magento 2

## Requirements
  * Magento Community Edition 2.1.x-2.4.x or Magento Enterprise Edition 2.1.x-2.4.x

## Installation Method 1 - Installing via composer
  * Open command line
  * Using command "cd" navigate to your magento2 root directory
  * Run the commands:
  
```
composer require olamragunathank/inventory-status
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
```

## Installation Method 2 - Installing via FTP using archive
  * Download [ZIP Archive](https://github.com/olamragunathank/inventory-status)
  * Extract files
  * In your Magento 2 root directory create folder app/code/Mindsprint/StockStatus
  * Copy files and folders from archive to that folder
  * In command line, using "cd", navigate to your Magento 2 root directory
  * Run the commands:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy

## Support
If you have any issues, please [contact us](mailto:contactus@mindsprint.org)
then if you still need help, open a bug report in GitHub's
[issue tracker](https://github.com/olamragunathank/inventory-status/issues).