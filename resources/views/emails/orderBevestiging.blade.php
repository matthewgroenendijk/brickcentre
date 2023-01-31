<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- For development, pass document through inliner -->
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
            line-height: 1.65;
        }

        img {
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }

        body,
        .body-wrap {
            width: 97% !important;
            margin: 0 auto;
            height: 100%;
            background: #efefef;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
        }

        a {
            color: #FFCF00;
            text-decoration: none;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .button a {
            display: inline-block;
            color: #ffffff;
            background: #FFCF00;
            border: 2px solid #FFCF00;
            padding: 9px 20px 10px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: normal;
        }

        .highlight {
            font-size: 22px;
            font-weight: bold;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 20px;
            line-height: 1.25;
        }

        h1 {
            font-size: 32px;
        }

        h2 {
            font-size: 28px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 20px;
        }

        h5 {
            font-size: 16px;
        }

        p,
        ul,
        ol {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 20px;
        }

        p.footnote {
            font-size: 10px;
            margin-top: 5px;
        }

        .container {
            display: block !important;
            clear: both !important;
            margin: 20px auto 0 !important;
            max-width: 580px !important;
        }

        .container table {
            width: 100% !important;
            border-collapse: collapse;
        }

        .container .preheader {
            font-size: 12px;
            padding: 5px 5px 5px 5px;
            color: #adadad;
            text-align: center;
        }

        .container .masthead {
            padding: 80px 0;
            background: #2a333b;
            color: rgb(255, 255, 255);
            background-image: url("https://www.freepnglogos.com/uploads/lego-png-logo/lego-logo-transparent-png-0.png");
            background-repeat: no-repeat;
            background-position: center 15px;
            border-radius: 10px 10px 0 0;
        }

        .masthead::before {
            opacity: 0.75;
        }

        .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
        }

        .container .content {
            background: white;
            padding: 20px 20px 0 20px;
        }

        .container .content.footer {
            background: none;
            padding-top: 0;
        }

        .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 12px;
        }

        .container .content.footer a {
            color: #888;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>


<body
    style="width:97% !important;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;height:100%;background-color:#efefef;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;">

    <table class="body-wrap"
        style="width:97% !important;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;height:100%;background-color:#efefef;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;">
        <tr>
            <td class="container"
                style="display:block !important;clear:both !important;margin-top:20px !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;max-width:580px !important;">


                <!-- Message start -->
                <table style="width:100% !important;border-collapse:collapse;">
                    <tr>
                        <td class="preheader" style="font-size: 10px;color:#adadad;text-align:center; padding:5px;">
                            Dit is uw order bevestiging</td>
                    </tr>
                    <tr>
                        <td align="center" class="masthead"
                            style="padding-top:80px;padding-bottom:80px;padding-right:0;padding-left:0;background-color:#2a333b;background-image:url('https://www.freepnglogos.com/uploads/lego-png-logo/lego-logo-transparent-png-0.png');background-repeat:no-repeat;background-position:center;background-size:contain;background-attachment:scroll;color:white;border-radius:10px 10px 0 0;">
                            <h1
                                style="line-height:1.25;font-size:32px;margin-top:0 !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;max-width:90%;">
                                Order Bevestiging</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="content"
                            style="background-color:white;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:20px;padding-bottom:0;padding-right:20px;padding-left:20px;">
                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Hallo
                                {{ $order->user_id }},</p>

                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Bedankt voor je bestelling!
                                Een overzicht van uw aankoopgegevens wordt hieronder weergegeven. Bewaar deze e-mail als
                                bevestiging van uw bestelling.</p>

                            <p style="font-size:18px;font-weight:bold;margin-bottom:20px;">ORDER INFORMATIE</p>

                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Orderdatum:
                                {{ date('d-m-Y') }} - {{ date('H:i') }}<br>OrderID: {{ $order->id }}</p>

                            <table style="width: 90% margin: 0 auto; margin-bottom: 20px;">

                                <tr style="background-color: #eeeeee;">
                                    <th style="font-size:13px;font-weight:bold;text-align:left;padding: 3px 6px;"
                                        width="70%">Artikel</th>
                                    <th style="font-size:13px;font-weight:bold;text-align:right;padding: 3px 6px;"
                                        width="30%" align="right">Prijs</th>
                                </tr>
                                @foreach ($order->product_name as $item)
                                    <tr style="border-bottom: solid 1px #f7f7f7;">
                                        <td style="font-size:13px;font-weight:normal;padding: 6px;vertical-align:top;">
                                            {{ $item }}
                                        </td>
                                        <td style="font-size:13px;font-weight:normal;padding: 6px;vertical-align:top;"
                                            align="right">€230,-</td>
                                    </tr>
                                @endforeach

                            </table>
                            <table style="width: 40%!important; margin-left: 60%; margin-bottom: 20px;">
                                <tr>
                                    <td style="font-size:13px;font-weight:normal;padding: 0px 6px;vertical-align:top;"
                                        align="right">Order Amount:</td>
                                    <td style="font-size:13px;font-weight:normal;padding: 0px 6px;vertical-align:top;"
                                        align="right">$14.99</td>
                                </tr>

                                <tr>
                                    <td style="font-size:13px;font-weight:normal;padding: 0px 6px;vertical-align:top;"
                                        align="right">ICANN Fees:</td>
                                    <td style="font-size:13px;font-weight:normal;padding: 0px 6px;vertical-align:top;"
                                        align="right">$0.18</td>
                                </tr>

                                <tr>
                                </tr>
                                <tr style="border-top: solid 2px #ccc;">
                                    <td style="font-size:13px;font-weight:bold;padding: 0px 6px;vertical-align:top;"
                                        align="right">Order Total:</td>
                                    <td style="font-size:13px;font-weight:bold;padding: 0px 6px;vertical-align:top;"
                                        align="right">$15.17</td>
                                </tr>
                            </table>



                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">
                                Als u vragen heeft over deze bestelling, kunt u eenvoudig deze e-mail beantwoorden met
                                uw vragen en we nemen zo snel mogelijk contact met u op. U hebt toegang tot een
                                afdrukbaar ontvangstbewijs voor al uw orders in <a
                                    href="https://www.hover.com/signin">uw account</a>.

                            </p>

                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Nogmaals bedankt voor uw
                                bedrijf! We stellen het op prijs dat u voor ons heeft gekozen.</p>

                            <!-- signature begin -->
                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Bedankt,</p>
                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">The World of Bricks</p>
                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">Haal hulp: <a
                                    href="https://help.hover.com/hc/en-us"
                                    style="color:#FFCF00;text-decoration:none;">https://help.hover.com/hc/en-us</a><br>
                            </p>
                        </td>
                    </tr>
                </table>
                <!-- body end -->
            </td>
        </tr>

        <!-- footer begin -->
        <tr>
            <td class="container"
                style="display:block !important;clear:both !important;margin-top:20px !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;max-width:580px !important;">
                <table style="width:100% !important;border-collapse:collapse;">
                    <tr>
                        <td class="content footer" align="center"
                            style="background-color:#efefef;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;padding-top:20px;padding-bottom:0;padding-right:20px;padding-left:20px;">
                            <p style="font-size:14px;font-weight:normal;margin-bottom:20px;">U ontvangt deze e-mail
                                omdat u klant bent van <a href="#">theworldofbricks.nl</a>.<br>
                                Mailing address: De Brinio 30, 3224GE, Hellevoetsluis<br>
                                Email: <a href="mailto:infotheworldofbricks@gmail.com"
                                    style="color:#FFCF00;text-decoration:none;">infotheworldofbricks@gmail.com</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- footer end -->

    </table>
</body>

</html>
