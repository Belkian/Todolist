<?php
?>

<div id="ModalRegister" class="hidden *:mt-0 space-y-6 bg-cyan-700 w-10/12 h-7/12 m-auto rounded-lg ">
    <h2 class="font-bold text-center">Register</h2>

    <label for="Name">Name :</label>
    <input type="text" id="Name" name="Name" value="sau" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">

    <label for="LastName">LastName :</label>
    <input type="text" id="LastName" name="LastName" value="clem" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">

    <label for="Email">Email :</label>
    <input type="Email" id="Email" name="Email" value="clem@clem.fr" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    <?php
    if ($code_erreur === 1) {
    ?><p class='error'>Le mail n'est pas valide."</p>
    <?php } ?>

    <label for="password">Password :</label>
    <input type="password" id="password" name="password" value="clemclem" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    <label for="password2">Password verify :</label>
    <input type="password" id="password2" name="password2" value="clemclem" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    <?php if ($code_erreur === 3) { ?>
        <p class='message error'>Les deux mots de passe doivent être identique.</p>
    <?php } ?>
    <?php if ($code_erreur === 4) { ?>
        <p class='message error'>Le mot de passe doit avoir au moins 8 caractères.</p>
    <?php } ?>
    <?php if ($code_erreur === 2) { ?>
        <p class='message error'>Tout les champs doivent être remplis.</p>
    <?php } ?>
    <div class="flex justify-evenly *:p-2 *:bg-yellow-600 *:rounded-lg *:m-2">
        <input type="submit" name="submit" value="S'inscrire" onclick="CreateNewUser()">
        <input type="submit" name="connect" value="Already register ?" onclick="HiddenRegisterConnexion()">
    </div>
</div>