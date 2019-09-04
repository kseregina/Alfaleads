<?php
    // считаем что валидация вся уже выполена на клиенте
    $name  = $_POST["name"];
    $phone = $_POST["phone"];

    // для простоты, берем адрес реально клиента
    // (может быть прокси, тогда нужно учесть X-Forwarded-For)
    $ip = $_SERVER["REMOTE_ADDR"];

    // адрес API
    // захардкожен для простоты
    // (не работало на добавление записей, ответчало 500, поэтому сделала эмуляцию на своем сайте)
    $api_url = "http://davkont.ru/scripts/test_task/api_sample.php";
    // $api_url = "http://alfashops.ru/scripts/test_task/api_sample.php";

    // ключ API (получен через реальное API get_api_key)
    // захардкожен для простоты
    // (в идеале должен браться из какого-нибудь хранилища ключей)
    $key = "8RQQtnBhBtDNti86";

    // подготавливаем запрос к API
    $curl = curl_init($api_url);

    // данные которые будут отправляться
    curl_setopt($curl, CURLOPT_POSTFIELDS, [
        "method" => "send_lead",
        "name"   => $name,
        "phone"  => $phone,
        "ip"     => $ip,
        "key"    => $key
    ]);

    // получаем результат как строку
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    // освобождам ресурсы
    curl_close($curl);

    // проверяем ошибки
    if ($response == FALSE) {
        $result = [
            "status"  => "error",
            "message" => "Ошибка при работе с сервером"
        ];
    } else {
        // декодируем резлуьтат из JSON-строки как массив
        $response_json = json_decode($response, true);

        // формируем ответ
        $result = [
            "status"  => $response_json["status"],
            "message" => $response_json["message"]
        ];
    }

    header("Content-Type: application/json");

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
