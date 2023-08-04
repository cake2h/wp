<?php
function submit_contact_form() {
	$name = sanitize_text_field($_POST["name"]);
	$email = sanitize_email($_POST["email"]);
	$phone = sanitize_text_field($_POST["phone"]);
	$question = sanitize_textarea_field($_POST["question"]);

	$error_messages = array();

	if (empty($name) || empty($email) || empty($phone) || empty($question)) {
		$error_messages[] = "Все поля обязательны для заполнения.";
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error_messages[] = "Некорректный адрес электронной почты.";
	}

	if (!preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $phone)) {
		$error_messages[] = "Некорректный номер телефона.";
	}

	if (strlen($question) < 10 || strlen($question) > 170) {
		$error_messages[] = "Задайте вопрос от 10 до 170 символов.";
	}

	if (empty($error_messages)) {
		$success = true;
		$message = "Форма успешно отправлена!";
	} else {
		$success = false;
		$message = implode("<br>", $error_messages);
	}

	echo json_encode(array("success" => $success, "message" => $message));
	wp_die();
}