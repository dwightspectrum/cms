<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no"> <!-- Tell iOS not to automatically link certain text strings. -->
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>CMS Notification</title> <!--   The title tag shows in email notifications, like Android 4.4. -->

    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 23 - 41 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>
        /* What it does: Tells the email client that only light styles are provided but the client can transform them to dark. A duplicate of meta color-scheme meta tag above. */
        :root {
            color-scheme: light;
            supported-color-schemes: light;
        }

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: forces Samsung Android mail clients to use the entire viewport */
        #MessageViewBody,
        #MessageWebViewDiv {
            width: 100% !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        a[x-apple-data-detectors],
        /* iOS */
        .unstyle-auto-detected-links a,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img+div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 17px !important;
            }

        }
    </style>
    <!-- Progressive Enhancements : END -->

</head>
<!--
    The email background color (#222222) is defined in three places:
    1. body tag: for most email clients
    2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
    3. mso conditional: For Windows 10 Mail
-->

<body width="100%" style="margin: 0; padding: 0 !important; background-color: #e4e4e4; mso-line-height-rule: exactly;">
    <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color: #e4e4e4;">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #e4e4e4;">
            <tr>
                <td>

                    <!-- Visually Hidden Preheader Text : BEGIN -->
                    <div style="max-height:0; overflow:hidden; mso-hide:all;" aria-hidden="true">
                        Survey Evaluation. (This is an auto-generated email from Hotwork CMS)
                    </div>
                    <!-- Visually Hidden Preheader Text : END -->

                    <!-- Create white space after the desired preview text so email clients don???t pull other distracting text into the inbox preview. Extend as necessary. -->
                    <!-- Preview Text Spacing Hack : BEGIN -->
                    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
                        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                    </div>
                    <!-- Preview Text Spacing Hack : END -->

                    <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
                    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                        <!--[if mso]>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600">
            <tr>
            <td>
            <![endif]-->

                        <!-- Email Body : BEGIN -->
                        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                            <!-- Email Header : BEGIN -->
                            <tr>
                                <td style="padding: 20px 0; text-align: center">
                                    <img src="https://app.hotwork.ag/public/images/hwi-logo-r.png" width="50" alt="alt_text" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;">
                                </td>
                            </tr>
                            <!-- Email Header : END -->

                            <!-- 1 Column Text + Button : BEGIN -->
                            <tr>
                                <td style="background-color: #ffffff;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                                <h1 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 16px; line-height: 30px; color: #333333; font-weight: normal;">Hi <?=$name;?>,</h1>
                                                <?php if($type == "employee"){?>
                                                    <p style="margin: 0;">Mr. <?=$survey->employee_first_name . ' ' .$survey->employee_last_name;?> requested a survey evaluation regarding on his performance with the client, <?=$survey->employee_job_history_client;?>. This evaluation will be sent to Hotwork CMS and will serve as an evaluation of every employee to their respective teams.</p>
                                                <?php }else{?>
                                                    <p style="margin: 0;">Mr. <?=$survey->freelancer_first_name . ' ' .$survey->freelancer_last_name;?> requested a survey evaluation regarding on his performance with the client, <?=$survey->freelancer_job_history_client;?>. This evaluation will be sent to Hotwork CMS and will serve as an evaluation of every employee to their respective teams.</p>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                                <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 15px; line-height: 22px; color: #333333; font-weight: bold;">To Be Evaluated: </h2>
                                                <ul style="padding: 0; margin: 0 0 10px 0; list-style-type: disc;">
                                                    <?php if($type == "employee"){?>
                                                        <li style="margin: 0 0 10px 30px;" class="list-item-first"><?=$survey->employee_first_name . ' ' .$survey->employee_last_name;?></li>
                                                        <li style="margin: 0 0 10px 30px;">Link: <a href="<?=base_url()?>employee/evaluation_report/<?=$survey->employee_id?>">Evaluation Form</a> <i>(Make sure to login first and the click this link)</i></li>
                                                    <?php }else{?>
                                                        <li style="margin: 0 0 10px 30px;" class="list-item-first"><?=$survey->freelancer_first_name . ' ' .$survey->freelancer_last_name;?></li>
                                                        <li style="margin: 0 0 10px 30px;">Link: <a href="<?=base_url()?>freelancer/evaluation_report/<?=$survey->freelancer_id?>">Evaluation Form</a> <i>(Make sure to login first and the click this link)</i></li>
                                                    <?php }?>
                                                </ul>
                                            </td>
                                        </tr>
                                        <!-- Button : BEGIN -->
                                        <!-- <tr>
                                            <td style="padding: 0 20px;">
                                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
                                                    <tr>
                                                        <td class="button-td button-td-primary" style="border-radius: 4px; background-color: #d33333;">
                                                            <a class="button-a button-a-primary" href="<?= base_url() ?>settings/view/" target="_blank" style="background-color: #d33333; border: 1px solid #d33333; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;">Open Task</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> -->
                                        <!-- Button : END -->
                                        <tr>
                                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" align="center">
                                                <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 15px; line-height: 22px; color: #333333; font-weight: bold;">Thank You!</h2>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- 1 Column Text + Button : END -->

                            <!-- 2 Even Columns : BEGIN -->
                            <!-- <tr>
                    <td style="padding: 0 10px 40px 10px; background-color: #ffffff;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td valign="top" width="50%">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: center; padding: 0 10px;">
                                                <img src="https://via.placeholder.com/200" width="200" height="" alt="alt_text" border="0" style="width: 100%; max-width: 200px; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px 10px 0;">
                                               <p style="margin: 0;">Maecenas sed ante pellentesque, posuere leo id, eleifend dolor.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="50%">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: center; padding: 0 10px;">
                                                <img src="https://via.placeholder.com/200" width="200" height="" alt="alt_text" border="0" style="width: 100%; max-width: 200px; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px 10px 0;">
                                                <p style="margin: 0;">Maecenas sed ante pellentesque, posuere leo id, eleifend dolor.</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> -->
                            <!-- 2 Even Columns : END -->

                        </table>
                        <!-- Email Body : END -->

                        <!-- Email Footer : BEGIN -->
                        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                            <tr>
                                <td style="padding: 20px; font-family: sans-serif; font-size: 14px; line-height: 20px; text-align: center; color: #333333;">
                                    <b>Hotwork International Inc.</b><br>
                                    Lapu-lapu City, Philippines.<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 25px; text-align: center;">
                                    <a href="https://www.facebook.com/hotwork.ag/" target="_blank">
                                        <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" width="24">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://www.instagram.com/hotworkinternational/" target="_blank">
                                        <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png" width="24">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://twitter.com/HotworkAG" target="_blank">
                                        <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" width="24">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://www.youtube.com/channel/UCFkwX1c1SmuAsocNoi_MEHA" target="_blank">
                                        <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png" width="24">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://www.linkedin.com/company/hotwork-international/" target="_blank">
                                        <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-linkedin-48.png" width="24">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://www.hotwork.ag/" target="_blank">
                                        <img src="https://app.hotwork.ag/public/images/hwi-logo-r.png" width="24">
                                </td>
                            </tr>
                        </table>
                        <!-- Email Footer : END -->

                        <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
                    </div>

                    <!-- Full Bleed Background Section : BEGIN -->
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #2f323e;">
                        <tr>
                            <td>
                                <div align="center" style="max-width: 600px; margin: auto;" class="email-container">
                                    <!--[if mso]>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
                        <tr>
                        <td>
                        <![endif]-->
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="padding: 20px; text-align: left; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff;">
                                                <p style="margin: 0;">THIS IS A SYSTEM-GENERATED EMAIL. PLEASE DO NOT REPLY.</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--[if mso]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!-- Full Bleed Background Section : END -->

                </td>
            </tr>
        </table>
    </center>
</body>

</html>