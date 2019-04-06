# Username and Password creater

It creating a spesific username and password
You can use this for WHM, FTP, Admin Panel etc.

---

### Installation
```sh
composer require atiksoftware/php-class-passgen
```

### Usage example
```php
require __DIR__.'/../vendor/autoload.php';

$auth = Atiksoftware\Security\Passgen::ForDomain("atiksoftware.com","!%&/xzcas56"); 
echo $auth["username"]."   ".$auth["password"]."\n";

// 4uj0et4d   [0m?/i_j)zqz


$auth = Atiksoftware\Security\Passgen::ForDomain("atiksoftware.com","123456"); 
echo $auth["username"]."   ".$auth["password"]."\n";

// 4uj0et4d   [0m?/i_j)zqz
