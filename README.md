# try-stripe-checkout-php

## run server

1. `composer install` を実施

2. `create-checkout-session.php`のAPI Keyとpriceを書き換える。

3. サーバーを起動する。
    ```
    php -S 127.0.0.1:4242 --docroot=public
    ```

4. http://127.0.0.1:4242/checkout.html にアクセスし、`Checkout`ボタンを押下するとStripe Checkoutのページに遷移します。
