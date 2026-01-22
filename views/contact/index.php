<!-- views/contact/index.php -->
<div class="contact-layout">
    <div class="contact-form">
        <h2 class="contact-form__title">Envoyez-nous un message</h2>
        <form action="/contact" method="POST">

            <div class="form-group">
                <label for="name" class="form-label form-label--required">Nom complet</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-input"
                    value="<?= e(old('name')) ?>"
                    placeholder="Votre nom"
                    minlength="2">
            </div>
            <div class="form-group">
                <label for="email" class="form-label form-label--required">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    value="<?= e(old('email')) ?>"
                    placeholder="votre@email.com">
            </div>
            <div class="form-group">
                <label for="message" class="form-label form-label--required">Message</label>
                <textarea
                    id="message"
                    name="message"
                    class="form-textarea"
                    placeholder="Décrivez votre demande..."
                    minlength="10"
                    rows="6"><?= e(old('message')) ?></textarea>
                <p class="form-hint">Minimum 10 caractères</p>
            </div>
            <button type="submit" class="btn btn--primary btn--lg">
                Envoyer le message
            </button>
        </form>
    </div>
    <aside class="contact-info">
        <h3 class="contact-info__title">Informations</h3>
        <div class="contact-info__item">
            <div class="contact-info__icon">📍</div>
            <div>
                <div class="contact-info__label">Adresse</div>
                <div class="contact-info__value">
                    123 Rue du Commerce<br>
                    75001 Paris, France
                </div>
            </div>
        </div>
        <div class="contact-info__item">
            <div class="contact-info__icon">📧</div>
            <div>
                <div class="contact-info__label">Email</div>
                <div class="contact-info__value">
                    contact@maboutique.fr
                </div>
            </div>
        </div>
        <div class="contact-info__item">
            <div class="contact-info__icon">📞</div>
            <div>
                <div class="contact-info__label">Téléphone</div>
                <div class="contact-info__value">
                    01 23 45 67 89
                </div>
            </div>
        </div>

        <div class="contact-info__item">
            <div class="contact-info__icon">🕐</div>
            <div>
                <div class="contact-info__label">Horaires</div>
                <div class="contact-info__value">
                    Lun - Ven : 9h - 18h<br>
                    Sam : 10h - 16h
                </div>
            </div>
        </div>
    </aside>
</div>