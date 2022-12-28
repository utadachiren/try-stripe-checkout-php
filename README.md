# try-stripe-checkout-php

## run server

1. `composer install` を実施

2. stripe webhook eventをローカルサーバーに転送する
    ```
    stripe login
    stripe status
    stripe listen --forward-to 127.0.0.1:4242/webhook.php
    ```

3. `create-checkout-session.php`のpriceとAPI Key、`webhook.php`のAPI Keyとendpoint_secretを書き換える。

4. サーバーを起動する。
    ```
    php -S 127.0.0.1:4242 --docroot=public
    ```

5. http://127.0.0.1:4242/checkout.html にアクセスし、`Checkout`ボタンを押下するとStripe Checkoutのページに遷移します。
