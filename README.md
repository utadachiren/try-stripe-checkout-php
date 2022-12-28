# try-stripe-checkout-php

## run server

`create-checkout-session.php`のAPI Keyとpriceを書き換え、サーバーを起動する。

```
php -S 127.0.0.1:4242 --docroot=public
```

http://127.0.0.1:4242/checkout.html にアクセスし、`Checkout`ボタンを押下するとStripe Checkoutのページに遷移します。
