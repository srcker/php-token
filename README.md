# captcha

登录token生成库

## 安装
> composer require srcker/token


## 使用

### 在控制器中输出验证码

在控制器的操作方法中使用

```php
    use srcker/Token;

    Token::encrypt('加密数据','加密key');
    Token::decrypt('解密数据','加密key');

```

## 使用OpenSSL AES 算法
```php
    use srcker/openssl/Token;
    
    Token::encrypt('加密数据','加密key','加密IV');
    Token::decrypt('解密数据','加密key','加密IV');

```
