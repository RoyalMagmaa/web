document.addEventListener("DOMContentLoaded", function () {
    console.log("JS chargé !");

    const stars = document.querySelectorAll(".star");
    const votreNote = document.getElementById("votre-note");
    const submitButton = document.getElementById("submit-rating");

    let selectedRating = 0;
    let entrepriseId =
        document.querySelector(".focus-entreprise").dataset.entrepriseId; // Ajoute cet attribut dans Blade

    stars.forEach((star) => {
        star.addEventListener("mouseover", function () {
            const rating = this.dataset.index;
            stars.forEach((s, i) => {
                s.style.color = i < rating ? "gold" : "gray";
            });
        });

        star.addEventListener("click", function () {
            selectedRating = this.dataset.index;
            votreNote.textContent = `Votre note : ${selectedRating}/5`;
        });
    });

    submitButton.addEventListener("click", function () {
        if (selectedRating === 0) {
            alert("Veuillez sélectionner une note avant de valider !");
            return;
        }

        console.log(`Note envoyée : ${selectedRating}, entrepriseId : ${entrepriseId}`);

        fetch(`/stageo/public/entreprises/liste/${entrepriseId}/evaluer`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ note: selectedRating })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => console.error('Erreur:', error));
    });
});
