<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class MenuComposer
{


    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = \App\Models\ChecklistGroup::with(
            [
                'checklists' => function($query)
                {
                    $query->whereNull('user_id');
                }
            ]
        )->get();

        $groups = [];
        foreach ($menu as $group) {
            $group['is_new'] = FALSE;
            $group['is_updated'] = FALSE;
            foreach ($group['checklists'] as &$checklist) {
                $checklist['is_new'] = FALSE;
                $checklist['is_updated'] = FALSE;
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;

            }
            $groups[] = $group;
        }

        $view->with('user_menu', $menu);
    }
}
