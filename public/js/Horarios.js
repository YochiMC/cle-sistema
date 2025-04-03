document.getElementById("search").addEventListener("input", function() {
    const filter = this.value.toLowerCase();
    const cards = document.querySelectorAll(".course-card");

    cards.forEach(card => {
        const materia = card.querySelector("p:nth-child(2)").textContent.toLowerCase();
        const profesor = card.querySelector("p:nth-child(3)").textContent.toLowerCase();
        const horario = card.querySelector("p:nth-child(4)").textContent.toLowerCase();

        if (materia.includes(filter) || profesor.includes(filter) || horario.includes(filter)) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });
});
