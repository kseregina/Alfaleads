<?php
    // Эмуляция API

    header("Content-Type: application/json");

    $result = [
        "status"  => "success",
        "message" => "Наш специалист свяжется с вами в течение нескольких минут",
        "data"    => [
            "name"  => $_POST["name"],
            "phone" => $_POST["phone"],
            "ip"    => $_POST["ip"]
        ],
        "key"     => $_POST["key"]
    ];

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
