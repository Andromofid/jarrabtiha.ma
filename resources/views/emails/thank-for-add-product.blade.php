<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Merci pour votre suggestion - Jarrabtiha</title>
</head>

<body style="
    margin:0;
    padding:0;
    background:#FFFDFD;
    font-family:Arial, Helvetica, sans-serif;
    color:#2B2430;
">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FFFDFD; padding:32px 16px;">
        <tr>
            <td align="center">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    style="
                    max-width:620px;
                    background:#FFFFFF;
                    border:1px solid #E9E4EA;
                    border-radius:24px;
                    overflow:hidden;
                    box-shadow:0 10px 35px rgba(43,36,48,0.07);
                ">

                    {{-- Header --}}
                    <tr>
                        <td
                            align="center"
                            style="
                            padding:32px 32px 24px;
                            background:#FDE8F0;
                        ">

                            <div
                                style="
                                display:inline-block;
                                padding:8px 16px;
                                border-radius:999px;
                                background:#FFFFFF;
                                color:#E85D8C;
                                font-size:12px;
                                font-weight:700;
                                letter-spacing:.5px;
                                text-transform:uppercase;
                            ">
                                Merci 💗
                            </div>

                            <h1
                                style="
                                margin:20px 0 0;
                                font-size:30px;
                                line-height:1.2;
                                color:#2B2430;
                                font-family:Georgia, 'Times New Roman', serif;
                                font-weight:700;
                            ">
                                Merci d’avoir ajouté un produit
                            </h1>

                            <p
                                style="
                                margin:12px 0 0;
                                font-size:15px;
                                line-height:1.7;
                                color:#6F6674;
                            ">
                                Ton aide permet à la communauté Jarrabtiha de découvrir encore plus de produits.
                            </p>

                        </td>
                    </tr>

                    {{-- Content --}}
                    <tr>
                        <td style="padding:32px;">

                            @if(!empty($userName))
                            <p
                                style="
                                    margin:0 0 16px;
                                    font-size:16px;
                                    line-height:1.7;
                                    color:#2B2430;
                                ">
                                Bonjour <strong>{{ $userName }}</strong>,
                            </p>
                            @else
                            <p
                                style="
                                    margin:0 0 16px;
                                    font-size:16px;
                                    line-height:1.7;
                                    color:#2B2430;
                                ">
                                Bonjour,
                            </p>
                            @endif

                            <p
                                style="
                                margin:0 0 24px;
                                font-size:15px;
                                line-height:1.8;
                                color:#6F6674;
                            ">
                                Nous avons bien reçu ta suggestion de produit.
                                Notre équipe va la vérifier avant de l’ajouter à la plateforme.
                            </p>

                            {{-- Product info --}}
                            @if(!empty($productName) || !empty($brand))
                            <table
                                width="100%"
                                cellpadding="0"
                                cellspacing="0"
                                border="0"
                                style="
                                    background:#FFF7FA;
                                    border:1px solid #FDE8F0;
                                    border-radius:16px;
                                    margin:0 0 28px;
                                ">
                                <tr>
                                    <td style="padding:20px;">

                                        <p
                                            style="
                                                margin:0 0 12px;
                                                font-size:12px;
                                                font-weight:700;
                                                color:#E85D8C;
                                                text-transform:uppercase;
                                                letter-spacing:.5px;
                                            ">
                                            Produit envoyé
                                        </p>

                                        @if(!empty($productName))
                                        <p
                                            style="
                                                    margin:0 0 6px;
                                                    font-size:18px;
                                                    font-weight:700;
                                                    color:#2B2430;
                                                ">
                                            {{ $productName }}
                                        </p>
                                        @endif

                                        @if(!empty($brand))
                                        <p
                                            style="
                                                    margin:0;
                                                    font-size:14px;
                                                    color:#6F6674;
                                                ">
                                            Marque : {{ $brand }}
                                        </p>
                                        @endif

                                    </td>
                                </tr>
                            </table>
                            @endif

                            <table
                                width="100%"
                                cellpadding="0"
                                cellspacing="0"
                                border="0"
                                style="
                                background:#EDF3FF;
                                border-radius:16px;
                                margin:0 0 28px;
                            ">
                                <tr>
                                    <td style="padding:20px;">

                                        <p
                                            style="
                                            margin:0 0 6px;
                                            font-size:14px;
                                            font-weight:700;
                                            color:#2B2430;
                                        ">
                                            Que se passe-t-il maintenant ?
                                        </p>

                                        <p
                                            style="
                                            margin:0;
                                            font-size:14px;
                                            line-height:1.7;
                                            color:#6F6674;
                                        ">
                                            Nous allons vérifier les informations du produit.
                                            Une fois validé, il pourra apparaître sur Jarrabtiha et recevoir des avis de la communauté.
                                        </p>

                                    </td>
                                </tr>
                            </table>

                            {{-- CTA --}}
                            @if(!empty($productsUrl))
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center">

                                        <a
                                            href="{{ $productsUrl }}"
                                            style="
                                                display:inline-block;
                                                background:#E85D8C;
                                                color:#FFFFFF;
                                                text-decoration:none;
                                                font-size:14px;
                                                font-weight:700;
                                                padding:14px 26px;
                                                border-radius:999px;
                                            ">
                                            Découvrir les produits
                                        </a>

                                    </td>
                                </tr>
                            </table>
                            @endif

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td
                            align="center"
                            style="
                            padding:24px 32px;
                            border-top:1px solid #E9E4EA;
                            background:#FFFFFF;
                        ">

                            <p
                                style="
                                margin:0 0 8px;
                                font-size:13px;
                                color:#6F6674;
                            ">
                                Merci de faire partie de la communauté Jarrabtiha 💗
                            </p>

                            <p
                                style="
                                margin:0;
                                font-size:12px;
                                color:#9A919E;
                            ">
                                © {{ date('Y') }} Jarrabtiha.ma
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>