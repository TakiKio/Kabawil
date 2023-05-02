<?php

return [
    'debug' => true,
    'routes' => [
        [
            'pattern' => 'logout',
            'action'  => function () {
    
                if ($user = kirby()->user()) {
                    $user->logout();
                }
        
                go('login');
            }
        ]
    ],
    'hooks' => [
        'page.changeStatus:before' => function (Page $page) {
            if ($page->status() === 'unlisted' && $this->user()->role() == 'editor') {
                throw new Exception('Nur die Chefredaktion (Petra) kann Seiten freigeben oder den Status einer überarbeiteten Seite ändern');
            }
        }
    ]
];
