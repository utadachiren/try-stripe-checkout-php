<?php

require '../vendor/autoload.php';

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey('This is your test secret API key.');

// You can find your endpoint's secret in your webhook settings
$endpoint_secret = 'This is your webhook signing secret.';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  exit();
}

function fulfill_order($line_items) {
    // TODO: fill me in
    error_log("Fulfilling order...");
    error_log($line_items);
}

// Handle the checkout.session.completed event
if ($event->type == 'checkout.session.completed') {
    // Retrieve the session. If you require line items in the response, you may include them by expanding line_items.
    $session = \Stripe\Checkout\Session::retrieve([
        'id' => $event->data->object->id,
        'expand' => ['line_items'],
    ]);

    $line_items = $session->line_items;
    // Fulfill the purchase...
    fulfill_order($line_items);
}

error_log("Passed signature verification!");
http_response_code(200);