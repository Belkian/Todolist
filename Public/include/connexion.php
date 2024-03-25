<?php
?>

<div id="ModalConnexion" class="shadow-2xl space-y-6 bg-cyan-700 w-10/12 h-7/12 m-auto rounded-lg">
    <h2 class="font-bold text-center">Connexion</h2>

    <div>
        <label for="email">Email :</label>
        <input value="clem@clem.fr" type="email" id="EmailConnexion" name="email" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto *:mt-0">

        <?php
        if ($code_erreur === 1) {
        ?>
            <p class='error'>Le email ou password n'est pas valide.</p>
        <?php } ?>
    </div>

    <div>
        <label for="passwordConnexion">Password :</label>
        <input value="clemclem" type="password" id="passwordConnexion" name="password" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    </div>
    <div class="flex justify-evenly *:p-2 *:bg-yellow-600 *:rounded-lg *:m-2">
        <input type="submit" name="submit" value="Se connecter" onclick="Connexion()">
        <input type="submit" name="submit" value="S'inscrire" onclick="HiddenRegisterConnexion()">
    </div>

</div>