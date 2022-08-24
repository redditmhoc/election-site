<?php

return [
    'oauth' => [
        'client_id' => env('REDDIT_CLIENT_ID', null),
        'secret' => env('REDDIT_SECRET', null),
        'redirect_uri' => env('REDDIT_REDIRECT_URI', config('app.env').'/auth/oauth/reddit/callback')
    ]
];
