<!DOCTYPE html>
<html>
<head>
    <title>Validaciones con Fetch</title>
</head>
<body>

<h2>Ejemplo de Validaciones</h2>
<form id="contactForm" action="process.php" method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br>
    Teléfono: <input type="text" name="telefono" placeholder="123-456-7890"><br><br>
    ¿Cuánto es 2 + 3?: <input type="text" name="captcha"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>
<div id="errors"></div>
<div id="response"></div>
<script src="form-handler.js" defer></script>
</body>
</html>