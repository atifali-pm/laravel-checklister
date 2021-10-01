<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChecklistShow extends Component
{
    public $checklist;
    public $opened_tasks = [];

    public function render()
    {
        return view('livewire.checklist-show');
    }

    public function toggle_task($task_id)
    {
        if(in_array($task_id, $this->opened_tasks)){
            $this->opened_tasks = array_diff($this->opened_tasks, [$task_id]);
        } else {
            $this->opened_tasks[] = $task_id;
        }
    }

}
