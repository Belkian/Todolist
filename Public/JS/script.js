let reponse = document.getElementById('erreur');

function CreateNewUser() {

    let Name = document.getElementById('Name').value;
    let LastName = document.getElementById('LastName').value;
    let Email = document.getElementById('Email').value;
    let password = document.getElementById('password').value;
    let password2 = document.getElementById('password2').value;
    if (password == password2) {
        let data = {
            "Name": Name,
            "LastName": LastName,
            "Email": Email,
            "password": password,
            "password2": password2
        }
        const request = new XMLHttpRequest();
        request.open('POST', 'traitement.php', true);

        request.setRequestHeader('Content-Type', 'application/json');
        data = JSON.stringify(data);

        request.send(data);

        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                console.log(request.responseText);
                reponse.innerHTML += request.responseText + "<br>";
                // reponse.innerHTML += JSON.parse(request.responseText) + "<br>";
            }
        }
    }
}

function Connexion() {
    let Email = document.getElementById('EmailConnexion').value;
    let password = document.getElementById('passwordConnexion').value;

    let data = {
        "Email": Email,
        "password": password,
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'authentication.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            reponse.innerHTML += request.responseText + "<br>";
            // reponse.innerHTML += JSON.parse(request.responseText) + "<br>";
        }
    }

}

function CreateTask() {
    let taskName = document.getElementById('taskName').value;
    let priority = document.getElementById('priority').value;
    let category = document.getElementById('category').value;
    let taskDescription = document.getElementById('taskDescription').value;
    let data = {
        "taskName": taskName,
        "priority": priority,
        "category": category,
        "taskDescription": taskDescription,
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'traitement.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            reponse.innerHTML += request.responseText + "<br>";
            // reponse.innerHTML += JSON.parse(request.responseText) + "<br>";
        }
    }

}