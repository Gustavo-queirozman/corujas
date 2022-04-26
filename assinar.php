<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/reset.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/btnMenu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/menu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/header.css" media="screen and (min-width: 1024px)">
    <link rel="stylesheet" type="text/css" href="./styles/assinar.css">
    <title>Corujas</title>
</head>

<?php
    require __DIR__.'/vendor/autoload.php';

    use \App\Pix\Payload;
    use Mpdf\QrCode\QrCode;
    use Mpdf\QrCode\Output;

    //INSTANCIA PRONCIPAL DO PAYLOAD PIX
    $obPayload = (new Payload)->setPixKey('02013885610')
                            ->setDescription('Plano Premium Corujas')
                            ->setMerchantName('Luiz Gustavo')
                            ->setMerchantCity('SAO PAULO')
                            ->setAmount(7.00)
                            ->setTxid('CORUJAS');

    //CÓDIGO DE PAGAMENTO PIX
    $payloadQrCode = $obPayload->getPayload();

    //QR CODE
    $obQrCode = new QrCode($payloadQrCode);

    //IMAGEM DO QRCODE
    $image = (new Output\Png)->output($obQrCode,200);
?>

<body>
    <header class="wrap-menu mobile">
        <div class="logo-menu">
            <img class="logo" src="./logo.png" alt="logo">
        </div>

        <a class="btnMenu btnMenu_open" href="#menu">Menu</a>

        <ul id="menu" class="menu">
            <li class="btnMenu btnMenu_close">Cursos</li>

            <li class="menu-item">
                <a class="menu-item-action" href="vagas.php">Vagas</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="meuCurriculo.php">Meu currículo</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="notificacaoTrabalhador.html">Notificação</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="ContaTrabalhador.php">Conta</a>
            </li>
        </ul>
    </header>

    <header class="header">
        <div class="logo">
            <img src="159369672_2830559943850837_6735875689925307654_n.png" alt="Logo">
        </div>

        <div class="menu">
            <ul>
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="meuCurriculo.php">Meu currículo</a></li>
                <li><a href="notificacao.html">Notificação</a></li>
                <li><a href="contaTrabalhador.php">Conta</a></li>
            </ul>
        </div>
    </header>

    <nav>
        <div>
            <div class="qrcode">
                <h1>QR CODE PIX</h1>
                <img src="data:image/png;base64, <?= base64_encode($image)?>"><br>

                <input class="codigo" placeholder="<?=$payloadQrCode?>" value="<?=$payloadQrCode?>">
                <button>Copiar pix</button><br><br>

                <span>Após efetuar o pagamento entre em<br> contato com 
                    o nosso suporte<br>
                    <b>+55 (38)99940-0531</b>
                </span>
            </div>

            <!--<div class="codigo">
                <span>Código pix:</span><br>
                <strong><?=$payloadQrCode?></strong>
            </div>-->
        </div>   
    </nav>



    <script>
        document.querySelector("button").addEventListener("click",
        function (event) {
                document.querySelector("input").select()
                document.execCommand('copy')
        })
    </script>
</body>

</html>

<?php 
echo '<script src="btnMenu.js"></script>';
?>
