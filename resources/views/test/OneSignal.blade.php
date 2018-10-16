<?PHP
function sendMessage() {
    $content      = array(
        "en" => 'English Message'
    );
    $headings     = array(
        "en" => 'English Title'
    );
    $url     = "test"; 

    $fields = array(
        'app_id' => "017fcce1-5ac4-4070-bec2-f4bba36014ca",
        'included_segments' => array('All'),
        'contents' => $content,
        'headings' => $headings,
        'url' => $url,
    );

    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic NGNlMmFlMWEtOTMxYi00MTUwLThlNzAtZjNiMDhiNzNkNjhm'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$response = sendMessage();
$return["allresponses"] = $response;
$return = json_encode($return);

$data = json_decode($response, true);
print_r($data);
$id = $data['id'];
print_r($id);

print("\n\nJSON received:\n");
print($return);
print("\n");
?>
