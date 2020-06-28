<?php

return [
    "public-key" => [
        "user" => file_get_contents( storage_path("keys/user-auth.key.pub") ),
    ],
    "private-key" => [
        "user" => file_get_contents( storage_path( "keys/user-auth.key" ) ),
    ]
];
