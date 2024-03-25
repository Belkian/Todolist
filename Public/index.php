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

<body id="erreur" style="background-image: url(https://images.unsplash.com/photo-1598538005493-ba386eba00c1?q=80&w=1958&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
    <header class="fixed inset-x-0 flex w-100% h-16 bg-cyan-400 rounded-b-lg text-2xl font-bold justify-center items-center">
        <h1>To Do List</h1>
    </header>
    <main class="pt-20">
        <?php include './include/TaskBoard.php' ?>

        <?php
        include './include/connexion.php';
        include './include/menu.php';
        include './include/newTask.php';
        include './include/params.php';
        include './include/Register.php';
        ?>

        <div id="bouton" class="hidden *:fixed *:rounded-full *:bg-cyan-300 flex *:size-14 justify-between m-5">
            <div class="left-1/4 bottom-3" onclick="menu()"><img src="./img/bars-solid.svg" alt="" class="size-10 w-full object-center mt-2"></div>
            <div class="left-2/4 bottom-3" onclick="NouvelleTache()"><img src="./img/plus-solid.svg" alt="" class="size-10 w-full object-center mt-2"></div>
            <div class="left-3/4 bottom-3" onclick="Params()"><img src="./img/gear-solid.svg" alt="" class="size-10 w-full object-center mt-2"></div>
        </div>
    </main>
    <footer>
    </footer>


</body>

<script src="https://cdn.tailwindcss.com"></script>
<script src="./JS/script.js"></script>

</html>