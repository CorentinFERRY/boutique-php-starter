<?php

// app/Controller/Controller.php

namespace App\Controller;

abstract class Controller
{
    /**
     * @param string $template
     * @param array<string, mixed> $data
     */
    protected function view(string $template, array $data = []): void
    {
        view($template, array_merge($data, [
            'flash' => getFlash()
        ]));
    }

    protected function redirect(string $url): void
    {
        redirect($url);
    }

    /**
     * @param array<string, mixed> $data
     * @param int $status
     */
    protected function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
