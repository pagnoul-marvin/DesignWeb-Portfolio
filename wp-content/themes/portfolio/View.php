<?php

class View
{
    public static function component(string $path, array $data = []): void
    {
        extract($data);

        $path = str_replace('.', '/', $path);

        require base_path("resources/components/{$path}.php");
    }
}