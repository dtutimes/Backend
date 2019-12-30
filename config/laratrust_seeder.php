<?php

return [
    'role_structure' => [
        'superuser' => [
            'profile' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d,p',
            'category' => 'c,r,u,d',
            'image' => 'p',
            'campaign' => 'c,r,u,d,s'
        ],
        'council' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d,p',
            'category' => 'c,r,u,d',
            'image' => 'p',
            'campaign' => 'c,r,u,d,s'
        ],
        'coordinator' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d,p',
            'gallery' => 'c,r,u,d',
            'album' => 'c,r,u,d,p',
            'category' => 'c,r,u,d',
            'image' => 'p'
        ],
        'columnist' => [
            'profile' => 'r,u',
            'story' => 'c,r,u,d',
            'category' => 'r'
        ],
        'photographer' => [
            'profile' => 'r,u',
            'album' => 'r',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'p' => 'publish',
        's' => 'send'
    ]
];
