#!/bin/bash
echo "####################"
echo "# Install PHP-Unit #"
echo "####################"
echo
composer install -o
echo
echo "#####################################"
echo "# Running PHP Unit to test programs #"
echo "#####################################"
echo
vendor/bin/phpunit
echo
echo "######################"
echo "# Running Solution 1 #"
echo "######################"
echo
php src/solution-1/index.php
echo
echo "######################"
echo "# Running Solution 2 #"
echo "######################"
echo
php src/solution-2/index.php
echo
echo "######################"
echo "# Running Solution 3 #"
echo "######################"
echo
php src/solution-3/index.php
echo
