let reponse = document.getElementById('erreur');
function CreateNewUser() {

    let Name = document.getElementById('Name').value;
    let LastName = document.getElementById('LastName').value;
    let Email = document.getElementById('Email').value;
    let password = document.getElementById('password').value;
    let password2 = document.getElementById('password2').value;

    let data = {
        "Name": Name,
        "LastName": LastName,
        "Email": Email,
        "password": password,
        "password2": password2
    }
    const request = new XMLHttpRequest();

    request.open('POST', '../../src/traitement.php', true);

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
