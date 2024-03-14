
function CreateNewUser() {

    let Name = document.getElementById('Name').value;
    let LastName = document.getElementById('LastName').value;
    let Email = document.getElementById('Email').value;
    let password = document.getElementById('password').value;
    let password2 = document.getElementById('password2').value;

    // Les options par défaut sont indiquées par *
    if (password == password2) {
        fetch("../../src/traitement.php", {
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
                'Name': Name,
                'LastName': LastName,
                'Email': Email,
                'password': password,
                'password2': password2
            }), // le type utilisé pour le corps doit correspondre à l'en-tête "Content-Type"

        }).then((response) => {
            if (!response.ok) {
                throw new Error("La réponse du serveur n'est pas OK");
            }
            return response.json();
        })
            .catch(error => {
                // Gestion des erreurs
                console.error('Une erreur s\'est produite:', error);
            });

    } else {
        //il y a une erreur a afficher
    }

}
