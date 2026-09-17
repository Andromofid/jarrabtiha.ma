<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nouveau produit ajouté</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background-color: #FDF8F5;
    font-family: Arial, Helvetica, sans-serif;
    color: #3D1F1F;
">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 15px;">
        <tr>
            <td align="center">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    style="
                    max-width: 600px;
                    background: #ffffff;
                    border-radius: 16px;
                    overflow: hidden;
                    border: 1px solid #F2D0C4;
                ">

                    {{-- Header --}}
                    <tr>
                        <td style="
                        background: #F2D0C4;
                        padding: 28px 30px;
                        text-align: center;
                    ">

                            <h1 style="
                            margin: 0;
                            font-size: 24px;
                            color: #3D1F1F;
                        ">
                                Jarrabtiha
                            </h1>

                            <p style="
                            margin: 8px 0 0;
                            font-size: 14px;
                            color: #6b4b4b;
                        ">
                                Nouveau produit soumis
                            </p>

                        </td>
                    </tr>

                    {{-- Content --}}
                    <tr>
                        <td style="padding: 32px 30px;">

                            <h2 style="
                            margin: 0 0 12px;
                            font-size: 21px;
                        ">
                                Un nouveau produit a été ajouté 👀
                            </h2>

                            <p style="
                            margin: 0 0 25px;
                            color: #7a6262;
                            line-height: 1.6;
                            font-size: 15px;
                        ">
                                Un utilisateur vient de proposer un nouveau produit
                                sur Jarrabtiha. Voici les informations envoyées.
                            </p>

                            {{-- User --}}
                            <div style="
                            background: #FDF8F5;
                            border-radius: 12px;
                            padding: 18px;
                            margin-bottom: 20px;
                        ">

                                <p style="
                                margin: 0 0 8px;
                                font-size: 12px;
                                text-transform: uppercase;
                                color: #C9956C;
                                font-weight: bold;
                            ">
                                    Ajouté par
                                </p>

                                <p style="margin: 0 0 4px; font-weight: bold;">
                                    {{ $product->client_name }}
                                </p>

                                <p style="
                                margin: 0;
                                color: #7a6262;
                                font-size: 14px;
                            ">
                                    {{ $product->email }}
                                </p>

                            </div>

                            {{-- Product --}}
                            <table
                                width="100%"
                                cellpadding="0"
                                cellspacing="0"
                                style="
                                border: 1px solid #F2D0C4;
                                border-radius: 12px;
                            ">

                                <tr>
                                    <td style="padding: 18px;">

                                        <p style="
                                        margin: 0 0 5px;
                                        font-size: 12px;
                                        color: #999;
                                    ">
                                            Produit
                                        </p>

                                        <p style="
                                        margin: 0;
                                        font-size: 18px;
                                        font-weight: bold;
                                    ">
                                            {{ $product->name }}
                                        </p>

                                    </td>
                                </tr>

                                @if($product->brand)
                                <tr>
                                    <td style="
                                        padding: 0 18px 18px;
                                    ">

                                        <p style="
                                            margin: 0 0 5px;
                                            font-size: 12px;
                                            color: #999;
                                        ">
                                            Marque
                                        </p>

                                        <p style="margin: 0;">
                                            {{ $product->brand }}
                                        </p>

                                    </td>
                                </tr>
                                @endif

                                @if($product->category)
                                <tr>
                                    <td style="
                                        padding: 0 18px 18px;
                                    ">

                                        <p style="
                                            margin: 0 0 5px;
                                            font-size: 12px;
                                            color: #999;
                                        ">
                                            Catégorie
                                        </p>

                                        <p style="margin: 0;">
                                            {{ $product->category->name }}
                                        </p>

                                    </td>
                                </tr>
                                @endif

                                @if($product->description)
                                <tr>
                                    <td style="
                                        padding: 0 18px 18px;
                                    ">

                                        <p style="
                                            margin: 0 0 5px;
                                            font-size: 12px;
                                            color: #999;
                                        ">
                                            Description
                                        </p>

                                        <p style="
                                            margin: 0;
                                            line-height: 1.6;
                                            color: #6b4b4b;
                                        ">
                                            {{ $product->description }}
                                        </p>

                                    </td>
                                </tr>
                                @endif

                            </table>

                            {{-- Button --}}
                            <div style="
                            margin-top: 30px;
                            text-align: center;
                        ">

                                <a
                                    href="{{ route('admin.products.edit', $product) }}"
                                    style="
                                    display: inline-block;
                                    background: #C9956C;
                                    color: #ffffff;
                                    text-decoration: none;
                                    padding: 13px 28px;
                                    border-radius: 999px;
                                    font-size: 14px;
                                    font-weight: bold;
                                ">
                                    Vérifier le produit
                                </a>

                            </div>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="
                        padding: 20px 30px;
                        text-align: center;
                        background: #FDF8F5;
                        color: #967979;
                        font-size: 12px;
                    ">
                            Notification automatique — Jarrabtiha.ma
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>