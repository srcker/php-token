# captcha

验证码类库，可用于API构成app、小程序、api等

## 安装
> composer require srcker/captcha


## 使用

### 在控制器中输出验证码

在控制器的操作方法中使用

```php
    use srcker/Captcha;

    $config  = [];
    $captcha = new Captcha($config);
    dump($captcha->entry());

    // 返回
    array(2) {
        ["code"] => string(4) "KK4Q"
        ["base64"] => string(2294) "data:image/png;base64,iVBOR..."
    }

```

## 配置可选参数
```php
    $config  = [
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 使用中文验证码
        'useZh'    => false,
        // 中文验证码字符串
        'zhSet'    => '你好啊撒打算打算打',
        // 使用背景图片
        'useImgBg' => false,
        // 验证码字体大小(px)
        'fontSize' => 25,
        // 是否画混淆曲线
        'useCurve' => true,
        // 是否添加杂点
        'useNoise' => true,
        // 验证码图片高度
        'imageH'   => 0,
        // 验证码图片宽度
        'imageW'   => 0,
        // 验证码位数
        'length'   => 4,
        // 验证码字体，不设置随机获取
        'fontttf'  => '',
        // 背景颜色
        'bg'       => [243, 251, 254],
    ];

```
