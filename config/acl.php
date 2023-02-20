<?php

return [
    'admins' => array_map(fn ($id) => trim($id), explode(',', env('ADMIN_ID'))),
];
