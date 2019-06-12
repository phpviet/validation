<p align="center">
    <a href="https://github.com/phpviet" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/50674062" height="100px">
    </a>
    <h1 align="center">Validation</h1>
    <br>
</p>

Thư viện hổ trợ kiểm tra các kiểu dữ liệu đặc thù trong nước ta 
được phát triển trên nền tảng [Respect/Validation](https://github.com/respect/validation).

[![Latest Version on Packagist](https://img.shields.io/packagist/v/phpviet/validation.svg?style=flat-square)](https://packagist.org/packages/phpviet/validation)
[![Build Status](https://img.shields.io/travis/phpviet/validation/master.svg?style=flat-square)](https://travis-ci.org/phpviet/validation)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpviet/validation.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpviet/validation)
[![StyleCI](https://styleci.io/repos/187063731/shield?branch=master)](https://styleci.io/repos/187063731)
[![Total Downloads](https://img.shields.io/packagist/dt/phpviet/validation.svg?style=flat-square)](https://packagist.org/packages/phpviet/validation)

## Cài đặt

Cài đặt PHP Việt Validation thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/validation
```

## Cách sử dụng

### Tích hợp sẵn trên các framework phổ biến hiện tại

- [`Laravel`](https://github.com/phpviet/laravel-validation)
- [`Symfony`](https://github.com/phpviet/symfony-validation)
- [`Yii`](https://github.com/phpviet/yii-validation)

hoặc nếu bạn muốn sử dụng không dựa trên framework thì tiếp tục xem tiếp.

### Các kiểu dữ liệu được hổ trợ kiểm tra hiện tại


- [`Số điện thoại di động`](#Số-điện-thoại-di-động)
- [`Số điện thoại bàn`](#Số-điện-thoại-bàn)
- [`Thẻ căn cước / chứng minh thư`](#Thẻ-căn-cước-/-chứng-minh-thư)
- [`Địa chỉ IP`](#Địa-chỉ-IP)


### Số điện thoại di động

```php
use PHPViet\Validation\Validator;

$input = 'số điện thoại';

var_dump(Validator::mobileVN()->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::mobileVN()->assert($input)); // throw exception nếu dữ liệu không hợp lệ.
```

### Số điện thoại bàn

```php
use PHPViet\Validation\Validator;

$input = 'số điện thoại';

var_dump(Validator::landLineVN()->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::landLineVN()->assert($input)); // throw exception nếu dữ liệu không hợp lệ.
```

### Thẻ căn cước / chứng minh thư

```php
use PHPViet\Validation\Validator;

$input = 'Số thẻ căn cước hoặc chứng minh thư';

var_dump(Validator::idVN()->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::idVN()->assert($input)); // throw exception nếu dữ liệu không hợp lệ.
```

### Địa chỉ IP

```php
use PHPViet\Validation\Validator;

$input = 'ipv4 hoặc ipv6';

var_dump(Validator::ipVN()->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::ipVN()->assert($input)); // throw exception nếu dữ liệu không hợp lệ.

// chỉ kiểm tra ipv4

var_dump(Validator::ipVN(4)->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::ipVN(4)->assert($input)); // throw exception nếu dữ liệu không hợp lệ.


// chỉ kiểm tra ipv6

var_dump(Validator::ipVN(6)->validate($input)); // trả về true hoặc false tương đương với dữ liệu hợp lệ hoặc không.

var_dump(Validator::ipVN(6)->assert($input)); // throw exception nếu dữ liệu không hợp lệ.
```

## Mở rộng

Do thư viện được phát trên nền tảng 
[Respect/Validation](https://github.com/respect/validation) nên bạn có thể sử dụng
toàn bộ tính năng kế thừa từ nó xem thêm tại [đây](https://respect-validation.readthedocs.io/en/1.1/).


## Dành cho nhà phát triển

Nếu như bạn cảm thấy các kiểu kiểm tra dữ liệu bên trên vẫn chưa đủ đối với thị trường 
trong nước và bạn muốn đóng góp để phát triển chung, chúng tôi rất hoan nghênh! 
Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp hoặc tạo `PR` 
để đóng góp thêm các kiểu kiểm tra dữ liệu còn thiếu sót. Cảm ơn!
