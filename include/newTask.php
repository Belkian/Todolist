<?php
?>

<form id="newTask" class="hidden space-y-6 bg-cyan-700 w-10/12 h-7/12 m-auto rounded-lg" action="../src/traitement.php" method="POST" name="addTask">
    <h2 class="font-bold text-center">New Task</h2>
    <div class="">
        <label for="name" class="font-bold">Task name</label>
        <input id="name" name="name_category" type="text" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    </div>
    <div class="mt-2">
        <label for="priority" class="font-bold">Priority</label>

        <select id="priority" name="id_priority" type="text" required class="capitalize block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
            <?php
            foreach ($priorities as $priority) {
                echo "<option class='capitalize' value=" . $priority->getId_category() . " >" . $priority->getName_category() . "</option>>";
            }
            ?>
        </select>
    </div>
    <div class="mt-2">
        <label for="category" class="font-bold">Category</label>
        <select id="category" name="id_category" type="text" required class="capitalize block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
            <?php
            foreach ($categories as $category) {

                echo "<option class='capitalize' value=" . $category->getId_category() . " >" . $category->getName_category() . "</option>>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="addTask" class="flex justify-center m-5 ">Add Task</button>
</form>