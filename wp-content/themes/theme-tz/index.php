<h2>Оставте заявку</h2>
<form id="contact-form">
	<div>
		<label for="name">Имя:</label><br>
		<input type="text" id="name" name="name" required><br>
	</div>
	<div>
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>
	</div>
	<div>
		<label for="phone">Телефон:</label><br>
		<input type="tel" id="phone" name="phone" required><br>
	</div>
	<div>
		<label for="question">Задать вопрос:</label><br>
		<textarea id="question" name="question" rows="4" required></textarea><br><br>
	</div>
	<div>
		<button type="submit">Отправить</button>
	</div>
</form>
<div id="error-message" style="color: red;"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const contactForm = document.getElementById("contact-form");
        const errorMessage = document.getElementById("error-message");

        contactForm.addEventListener("submit", async function(event) {
            event.preventDefault();

            const formData = new FormData(contactForm);

                const response = await fetch("functions.php?action=submit_contact_form", {
                    method: "POST",
                    body: formData,
                });

                const data = await response.json();
                if (data.success) {
                    contactForm.reset();
                    errorMessage.textContent = "";
                    alert("Форма успешно отправлена!");
                } else {
                    errorMessage.textContent = data.message;
                }
        });
    });
</script>
