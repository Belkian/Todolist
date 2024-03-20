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
            Connexion.classList.add("hidden");
            Register.classList.add("hidden");

            GetAllTask();
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


function GetAllTask() {
    
}

function CreateTask() {
    let taskName = document.getElementById('taskName').value;
    let priority = document.getElementById('priority').value;
    // let category = document.getElementById('category').value;
    let taskDescription = document.getElementById('taskDescription').value;
    let Date = document.getElementById('date').value;
    let id_user = sessionStorage.getItem("Id_User");
    let data = {
        "Title": taskName,
        "IdPriority": priority,
        // "IdCategory": category,
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
             reponse.innerHTML += request.responseText + "<br>";
            GetAllTask();
        }
    }
}

function NouvelleTache() {
    let NewTask = document.getElementById("ModalnewTask");
    NewTask.classList.toggle("hidden");
}
// function affichage_nouvel_tesk(json) {
//     //création d'une div en fonction des données reçus
   
//    <div class=" w-2/3 h-12 flex justify-between items-center bg-cyan-600 my-3 mx-auto *:m-4 rounded-md *:text-white">
//         <div class="flex *:m-1 ">
//             <input type="checkbox" name="" id="" class="size-6 ">
//                 <h3>Tache</h3>
//         </div>

//         <div class="flex justify-end *:m-4">
//             <h4>Description</h4>
//             <p></p>
//             <h4>priority</h4>
//             <h4>catégory</h4>
//         </div>
// }