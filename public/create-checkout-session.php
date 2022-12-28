<?php

require '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('This is your test secret API key.');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => 'Provide the exact Price ID (e.g. pr_1234) of the product you want to sell',
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => $YOUR_DOMAIN . '?success=true',
  'cancel_url' => $YOUR_DOMAIN . '?canceled=true',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
