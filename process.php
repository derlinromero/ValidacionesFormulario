<?php
$name = trim(strip_tags($_POST['name'] ?? ''));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$telefono = trim($_POST['telefono'] ?? '');
$captcha = trim($_POST['captcha'] ?? '');

$errors = [];

// Validar nombre
if (empty($name)) {
    $errors[] = "El nombre es obligatorio.";
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Formato de correo inválido.";
}

// Validar teléfono
if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
    $errors[] = "El número de teléfono debe tener el formato 123-456-7890.";
}

// Validar captcha
if ($captcha !== "5") {
    $errors[] = "Captcha incorrecto.";
}

if (!empty($errors)) {
    echo "<div style='color: red;'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div>";
} else {
    echo "<p style='color: green'>Formulario enviado exitosamente.</p>";
}
?>
