<?php

use src\Models\Database;
use src\Repository\CategoryRepository;
use src\Repository\PriorityRepository;

$db = new Database();
$priorities = new PriorityRepository();
$categories = new CategoryRepository();
$categoriesManager = $categories->getAllCategory();
$prioritiesManager = $priorities->getAllPriority();

?>

<div id="ModalnewTask" class="hidden fixed top-16 shadow-2xl space-y-6 bg-cyan-700 w-full h-fit rounded-lg">
    <h2 class="font-bold text-center">New Task</h2>
    <div style="margin: 0 4px 2px 4px;">
        <label for="name_task" class="font-bold">Task name</label>
        <input id="taskName" name="name_task" type="text" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    </div>

    <div style="margin: 0 4px 2px 4px;">
        <label for="description" class="font-bold">Task description</label>
        <input id="taskDescription" name="description" type="text" required class="block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    </div>

    <div style="margin: 0 4px 2px 4px;">
        <label for="id_priority" class="font-bold">Priority</label>

        <select id="priority" name="id_priority" type="text" required class="capitalize block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
            <?php

            foreach ($prioritiesManager as $key => $value) {
                echo "<option class='capitalize' value=" . $value->ID . " >" . $value->PRIORITY . "</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin: 0 4px 2px 4px;">
        <label for="id_category" class="font-bold">Category</label>
        <select id="category" name="id_category" type="text" required class="capitalize block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
            <?php
            foreach ($categoriesManager as $category => $value) {

                echo "<option class='capitalize' value=" . $value->ID . " >" . $value->NAME . "</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin: 0 4px 2px 4px;">
        <label for="date" class="font-bold">Date</label>
        <input id="date" name="date" type="date" required class="capitalize block w-10/12 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 m-auto">
    </div>

    <button type="submit" name="addTask" class="p-2 bg-yellow-600 rounded-lg w-full m-auto" onclick="CreateTask()">Add Task</button>
</div>