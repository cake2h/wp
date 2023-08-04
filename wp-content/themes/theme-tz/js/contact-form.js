document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.getElementById("contact-form");
    const errorMessage = document.getElementById("error-message");

    contactForm.addEventListener("submit", async function(event) {
        event.preventDefault();

        const formData = new FormData(contactForm);

        const response = await fetch(contactFormAjax.ajax_url + "?action=submit_contact_form", {
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
