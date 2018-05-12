<?php
include('vendor/rmccue/requests/library/Requests.php');
Requests::register_autoloader();
$headers = array();

$pair = $_POST['pair'];
$type = $_POST['type'];
$counter_vol  = $_POST['counter_volume'];

$data = array(
    'pair' => $pair,
    'type' => $type,
    'counter_volume' => $counter_vol
);
$options = array('auth' => array('keyid', 'keysecret'));
$response = Requests::post('https://api.mybitx.com/api/1/marketorder', $headers, $data, $options);

echo json_decode($response);
?>

