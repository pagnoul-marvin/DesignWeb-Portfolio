<?php

namespace Validator;

class Validator
{

    public static function validateEmail($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public static function emailContainsAtSymbol(string $email): bool
    {

        if (!str_contains($email, '@')) {
            return false;
        }

        return true;
    }

    public static function min(string $key, int $value): bool
    {
        if (mb_strlen($_REQUEST[$key]) < $value) {
            $_SESSION['errors'][$key] = "{$key} doit avoir une taille minimum de {$value} caractères";

            return false;
        }

        return true;
    }

    public static function required(string $key): bool
    {
        if (empty($_REQUEST[$key])) {
            $_SESSION['errors'][$key] = "{$key} doit obligatoirement être fourni";

            return false;
        }

        return true;
    }
}