<?php
// app/helpers.php

function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function view(string $template, array $data = []): void
{
    extract($data);
    
    ob_start();
    require __DIR__ . "/../views/$template.php";
    $content = ob_get_clean();
    
    require __DIR__ . '/../views/layout.php';
}

function redirect(string $url): void
{
    header("Location: $url");
    exit;
}