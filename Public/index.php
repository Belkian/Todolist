<?php
include("./../src/autoload.php");
$code_erreur = null;
if (isset($_GET['erreur'])) {
    $code_erreur = (int) $_GET['erreur'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>

<body id="erreur" class="">
    <header class=" flex w-100% h-16 bg-cyan-400 rounded-b-lg text-2xl font-bold justify-center items-center">
        <h1>To Do List</h1>
    </header>
    <main>
        <div class=" w-2/3 h-12 flex justify-between items-center bg-cyan-600 my-3 mx-auto *:m-4 rounded-md *:text-white">
            <div class="flex *:m-1 ">
                <input type="checkbox" name="" id="" class="size-6 ">
                <h3>Tache</h3>
            </div>

            <div class="flex justify-end *:m-4">
                <h4>Description</h4>
                <p></p>
                <h4>priority</h4>
                <h4>catégory</h4>
            </div>

        </div>

        <?php
        include './include/connexion.php';
        include './include/menu.php';
        include './include/newTask.php';
        include './include/params.php';
        include './include/Register.php';
        ?>

    </main>
    <footer class="*:rounded-full *:bg-cyan-300 flex *:size-16 justify-between m-5">
        <div onclick="menu()">menu</div>
        <div onclick="NouvelleTache()">ajout d'une tache +</div>
        <div onclick="Params()">parametre</div>

    </footer>


</body>

<script src="https://cdn.tailwindcss.com"></script>
<script src="./JS/script.js"></script>

</html>