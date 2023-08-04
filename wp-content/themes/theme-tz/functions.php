<?php
// Добавляем обработчик для отправки формы контактов
function enqueue_contact_form_scripts() {
wp_enqueue_script('contact-form-script', get_template_directory_uri() . '/js/contact-form.js', array('jquery'), '1.0', true);

// Передаем параметры скрипту через объект 'wp_localize_script'
wp_localize_script('contact-form-script', 'contactFormAjax', array(
'ajax_url' => admin_url('admin-ajax.php'),
));
}
add_action('wp_enqueue_scripts', 'enqueue_contact_form_scripts');

// Обработчик AJAX запроса для отправки формы
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
add_action('wp_ajax_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form');
