<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$mobile = $_GET['mobile'] ?? null;
if (!$mobile) {
    echo json_encode(["error" => "Missing 'mobile' parameter"]);
    exit;
}

$url = "https://mynkapi.amit1100941.workers.dev/?mobile=" . urlencode($mobile) . "&key=onlymynk";
$response = file_get_contents($url);
if (!$response) {
    echo json_encode(["error" => "Failed to fetch data"]);
    exit;
}

$data = json_decode($response, true);
if (!isset($data["data"])) {
    echo json_encode(["error" => "Invalid response"]);
    exit;
}

// Remove developer credits
unset($data["developer_message"], $data["developer_tag"]);

echo json_encode([
    "status" => "success",
    "results" => $data["data"]
], JSON_PRETTY_PRINT);
?>