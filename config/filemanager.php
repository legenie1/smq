<?php
return [
    'base_route'      => 'admin/filemanager',
    'middleware'      => ['web', 'auth'],
    'allow_format'    => 'jpeg,jpg,png,gif,webp,pdf,mp4,docx',
    'max_size'        => 2000,
    'max_image_width' => 1024,
    'image_quality'   => 80,
];