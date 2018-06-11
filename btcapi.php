<?

$guid="GUID_HERE";
$main_password="PASSWORD_HERE";
$second_password="PASSWORD_HERE";
$amounta = "10000000";
$to = "1A8JiWcwvpY7tAopUkSnGuEYHmzGYfZPiq";
$from = "1ExD2je6UNxL5oSu6iPUhn9Ta7UrN8bjBy";
$fee = "";
$json_url = "http://localhost:3000/merchant/$guid/payment?password=$main_password&second_password=$second_password&to=$address&amount=$amount&from=$from&fee=$fee";

$json_data = file_get_contents($json_url);

$json_feed = json_decode($json_data);

$message = $json_feed->message;
$txid = $json_feed->tx_hash;

echo $message;

?>

<?

$guid="GUID_HERE";
$main_password="PASSWORD_HERE";

$json_url = "http://localhost:3000/merchant/$guid/balance?password=$main_password";

$json_data = file_get_contents($json_url);

$json_feed = json_decode($json_data);

$message = $json_feed->message;
$txid = $json_feed->tx_hash;

echo $message;

?>
<?

$guid="GUID_HERE";
$main_password="PASSWORD_HERE";

$json_url = "http://localhost:3000/merchant/$guid/list?password=$main_password";

$json_data = file_get_contents($json_url);

$json_feed = json_decode($json_data);

$message = $json_feed->message;
$txid = $json_feed->tx_hash;

echo $message;

?>
<?

$guid="GUID_HERE";
$main_password="PASSWORD_HERE";
$address = "any bitcoin address";

$json_url = "http://localhost:3000/merchant/$guid/address_balance?password=$main_password&address=$address";

$json_data = file_get_contents($json_url);

$json_feed = json_decode($json_data);

$message = $json_feed->message;
$txid = $json_feed->tx_hash;

echo $message;

?>