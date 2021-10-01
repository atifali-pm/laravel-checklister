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
        $view->with('user_menu', $menu);
    }
}
