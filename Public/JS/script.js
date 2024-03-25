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
        "password": password
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'authentication.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            ObjectUser = JSON.parse(request.responseText);
            sessionStorage.setItem('Id_User', ObjectUser.ID);
            AffichageUser(ObjectUser);
            let Register = document.querySelector('#ModalRegister');
            let Connexion = document.querySelector('#ModalConnexion');
            let bouton = document.querySelector('#bouton');
            Connexion.classList.add("hidden");
            Register.classList.add("hidden");
            bouton.classList.remove("hidden");
            GetAllTask(ObjectUser.ID);
        }
    }
}


function GetAllTask(id_user) {

    let data = {
        "GetTaskUser": true,
        "Id_User": id_user,
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'traitement.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let tableauTaches = JSON.parse(request.responseText)
            tableauTaches.forEach(tache => {
                afficheTask(tache);
            });
        }
    }

}

function AffichageUser(ObjectUser) {
    let h1 = document.querySelector('h1');
    h1.textContent = '';
    h1.textContent = `Bonjour, ${ObjectUser.NAME}`;
}

function HiddenRegisterConnexion() {
    let Register = document.querySelector('#ModalRegister');
    let Connexion = document.querySelector('#ModalConnexion');
    Connexion.classList.toggle("hidden");
    Register.classList.toggle("hidden");
}


function CreateTask() {
    let taskName = document.getElementById('taskName').value;
    let priority = document.getElementById('priority').value;
    let taskDescription = document.getElementById('taskDescription').value;
    let Date = document.getElementById('date').value;
    let id_user = sessionStorage.getItem("Id_User");
    let data = {
        "Title": taskName,
        "IdPriority": priority,
        "Date": Date,
        "Task": taskDescription,
        "IdUser": id_user
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'traitement.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let tableauTaches = JSON.parse(request.responseText)
            let tache = document.querySelector('#taskboard');
            tache.innerHTML = '';
            tableauTaches.forEach(tache => {
                afficheTask(tache);
            });
        }
    }
}


function DeleteThisTask(id_user, Id_Task) {

    let data = {
        "Id_User": id_user,
        "Id_Task": Id_Task,
    }
    const request = new XMLHttpRequest();
    request.open('POST', 'traitement.php', true);

    request.setRequestHeader('Content-Type', 'application/json');
    data = JSON.stringify(data);

    request.send(data);

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            let tableauTaches = JSON.parse(request.responseText);
            let tache = document.querySelector('#taskboard');
            tache.innerHTML = '';
            tableauTaches.forEach(tache => {
                afficheTask(tache);
            });

        }
    }

}





function afficheTask(Task) {

    let tache = document.querySelector('#taskboard');
    tache.innerHTML += `<div class=" w-2/3 h-12 flex justify-between items-center bg-cyan-600 my-3 mx-auto *:m-4 rounded-md *:text-white">
    <div class="flex *:m-1 shadow-2xl">
    <img src="./img/trash-solid.svg" alt="" class="size-5" onclick="DeleteThisTask(${Task.ID_USER},${Task.ID})">
    <input type="checkbox" value="task${Task.ID}" class="size-6">
    <h3>${Task.TITLE}</h3>
    </div>
    <div class="flex justify-end *:m-4">
    <h4>${Task.TASK}</h4>
    <p>${Task.DATE}</p>
    <h4 class="${Task.PRIORITY}">${Task.PRIORITY}</h4>
    <h4>${Task.CATEGORY}</h4> 
    </div>
    </div>`;
}

function Params() {
    let NewTask = document.getElementById("ModalnewTask");
    let Parametre = document.querySelector('#Params');
    Parametre.classList.toggle('hidden');
    NewTask.classList.add('hidden');

}
function NouvelleTache() {
    let NewTask = document.getElementById("ModalnewTask");
    let Parametre = document.querySelector('#Params');
    NewTask.classList.toggle("hidden");
    Parametre.classList.add('hidden');
}
