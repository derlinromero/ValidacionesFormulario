const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const errors = [];
  const telefono = document.querySelector('input[name="telefono"]').value.trim();
  const captcha = document.querySelector('input[name="captcha"]').value.trim();

  // Validación de teléfono
  const telefonoRegex = /^\d{3}-\d{3}-\d{4}$/;
  if (!telefonoRegex.test(telefono)) {
    errors.push("El número de teléfono debe tener el formato 123-456-7890.");
  }

  // Validación de CAPTCHA
  if (captcha !== "5") {
    errors.push("El CAPTCHA es incorrecto.");
  }

  // Mostrar errores si existen
  const errorDiv = document.getElementById("errors");
  if (errors.length > 0) {
    errorDiv.innerHTML = errors.map(err => `<p style="color:red">${err}</p>`).join("");
    return;
  } else {
    errorDiv.innerHTML = ""; // Limpiar errores si todo está bien
  }

  const formData = new FormData(form);

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
      .then(response => response.text())
      .then(data => {
        document.getElementById('response').innerHTML = data;
      })
      .catch(error => {
        console.error('Error:', error);
      });
});
