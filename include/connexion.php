<?php
?>

<form action="../src/traitement.php" method="post" onsubmit="return Validation()" class="hidden space-y-6 bg-cyan-700 w-10/12 h-7/12 m-auto rounded-lg">
    <h2 class="font-bold text-center">Connexion</h2>

    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">

        <?php
        if ($code_erreur === 1) {
        ?>
            <p class='error'>Le email n'est pas valide."</p>
        <?php } ?>
    </div>

    <div>
        <label for="passwordConnexion">Password :</label>
        <input type="passwordConnexion" id="passwordConnexion" name="passwordConnexion" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
        <?php if ($code_erreur === 7) { ?>
            <p class='message error'>Mauvais password</p>
        <?php } ?>
    </div>
    <input type="submit" name="submit" value="Se connecter">
</form>