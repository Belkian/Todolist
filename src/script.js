
function hashmdp() {
    var mdp = document.getElementById('mdp').value;
    var progress = document.getElementById('progress');
    var resultat = document.getElementById('resultat');


    // Les options par défaut sont indiquées par *
    fetch("traitement.php", {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            "Content-Type": "application/json",
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify({
            'mdp': mdp,
            'hash': 'md5'
        }), // le type utilisé pour le corps doit correspondre à l'en-tête "Content-Type"

    }).then((response) => {
        if (!response.ok) {
            throw new Error("La réponse du serveur n'est pas OK");
        }

        return response.json(); // transforme la réponse JSON reçue en objet JavaScript natif
    })
        .then(data => {
            // Manipulation des données obtenues
            resultat.innerHTML += data + "<br>";
        })
        .catch(error => {
            // Gestion des erreurs
            console.error('Une erreur s\'est produite:', error);
        });

}

function ModifyTitle() {

}