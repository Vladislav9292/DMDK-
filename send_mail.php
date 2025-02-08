<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ваш email, куда будут приходить сообщения
    $to = "baikeeva.krd@mail.ru";  // Замените на свой email

    // Получаем данные из формы
    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Проверка на заполненность
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        http_response_code(400);
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    // Заголовки письма
    $subject = "Новая заявка с сайта ДМДК+";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Формирование тела письма
    $body = "Имя: $name\n";
    $body .= "Телефон: $phone\n\n";
    $body .= "Сообщение:\n$message\n";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Спасибо! Ваше сообщение отправлено.";
    } else {
        http_response_code(500);
        echo "Ошибка при отправке сообщения.";
    }
} else {
    http_response_code(403);
    echo "Доступ запрещен.";
}
?>