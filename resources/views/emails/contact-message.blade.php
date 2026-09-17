<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
</head>
<body style="margin: 0; padding: 0; background: #FDF8F5; color: #3D1F1F; font-family: Arial, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background: #FDF8F5; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 640px; overflow: hidden; border: 1px solid #F2D0C4; border-radius: 20px; background: #ffffff;">
                    <tr>
                        <td style="padding: 28px 32px; border-bottom: 1px solid #F2D0C4;">
                            <p style="margin: 0 0 8px; color: #C9956C; font-size: 12px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;">
                                Jarrabtiha
                            </p>
                            <h1 style="margin: 0; color: #3D1F1F; font-size: 26px; line-height: 1.25;">
                                Nouveau message reçu depuis Jarrabtiha
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 28px 32px;">
                            <p style="margin: 0 0 6px; color: #8A6F62; font-size: 12px; font-weight: 700; text-transform: uppercase;">Nom</p>
                            <p style="margin: 0 0 20px; color: #3D1F1F; font-size: 16px;">{{ $name }}</p>

                            <p style="margin: 0 0 6px; color: #8A6F62; font-size: 12px; font-weight: 700; text-transform: uppercase;">Email</p>
                            <p style="margin: 0 0 20px; color: #3D1F1F; font-size: 16px;">{{ $email }}</p>

                            <p style="margin: 0 0 6px; color: #8A6F62; font-size: 12px; font-weight: 700; text-transform: uppercase;">Sujet</p>
                            <p style="margin: 0 0 20px; color: #3D1F1F; font-size: 16px;">{{ $subject }}</p>

                            <p style="margin: 0 0 6px; color: #8A6F62; font-size: 12px; font-weight: 700; text-transform: uppercase;">Message</p>
                            <div style="white-space: pre-line; margin: 0; color: #3D1F1F; font-size: 15px; line-height: 1.7;">{{ $contactMessage }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 18px 32px; border-top: 1px solid #F2D0C4; color: #8A6F62; font-size: 13px;">
                            Répondez directement à cet email pour contacter {{ $name }}.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
