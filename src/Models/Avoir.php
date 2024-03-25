<?php

namespace src\Models;

use src\Services\Hydratation;
use src\Models\Task;
use src\Models\User;

class Avoir
{
    private Task $Task;
    private User $User;
    private Category $Category;

    use Hydratation;
    /**
     * Get the value of Task
     */
    public function getTask(): Task
    {
        return $this->Task;
    }

    /**
     * Set the value of Task
     */
    public function setTask(Task $Task): self
    {
        $this->Task = $Task;

        return $this;
    }

    /**
     * Get the value of User
     */
    public function getUser(): User
    {
        return $this->User;
    }

    /**
     * Set the value of User
     */
    public function setUser(User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * Get the value of Category
     */
    public function getCategory(): Category
    {
        return $this->Category;
    }

    /**
     * Set the value of Category
     */
    public function setCategory(Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }
}
