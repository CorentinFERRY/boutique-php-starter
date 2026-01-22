<?php

// app/helpers.php

function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * @param string $template
 * @param array<string, mixed> $data
 */
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

// Helper d'URL
function url(string $path): string
{
    return $path;
}

// Lire une valeur en session
function session(string $key, mixed $default = null): mixed
{
    return $_SESSION[$key] ?? $default;
}

// Écrire une valeur en session
function setSession(string $key, mixed $value): void
{
    $_SESSION[$key] = $value;
}

// Créer un flash message
function flash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,      // 'success', 'error', 'warning'
        'message' => $message,
    ];
}

// Récupérer et supprimer le flash message
/**
 * @return array<string, string>|null
 */
function getFlash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']); // Supprime après lecture

    return $flash;
}

function old(string $key, string $default = ''): string
{
    return $_SESSION['old'][$key] ?? $default;
}

/**
 * @param array<string, mixed> $data
 */ 
function setOld(array $data): void
{
    $_SESSION['old'] = $data;
}

function clearOld(): void
{
    unset($_SESSION['old']);
}
