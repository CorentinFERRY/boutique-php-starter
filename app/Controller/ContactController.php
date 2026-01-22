<?php

namespace App\Controller;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->view('contact/index', [
            'title' => 'Contactez-nous',
        ]);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, string>
     */
    public function validate(array $data): array
    {
        $errors = [];

        if (empty($data['name'] ?? '')) {
            $errors['name'] = 'Le nom est requis.';
        }

        if (empty($data['email'] ?? '') || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Un email valide est requis.';
        }

        if (empty($data['message'] ?? '')) {
            $errors['message'] = 'Le message est requis.';
        }

        return $errors;
    }

    // Dans ContactController
    public function send(): void
    {
        $errors = $this->validate($_POST);

        if (!empty($errors)) {
            setOld($_POST); // Sauvegarde les données
            flash('error', 'Veuillez corriger les erreurs.');
            redirect('/contact');
        }

        // Envoi OK
        clearOld();
        flash('success', 'Message envoyé !');
        redirect('/contact');
    }
}
