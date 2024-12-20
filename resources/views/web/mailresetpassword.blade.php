<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">

body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<body style="margin: 10 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">


{{-- <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
</div> --}}

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:10px;margin-top:60px;margin-bottom:60px">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
             <tr>
                <td align="center" valign="top" style="font-size:0; padding: 10px; height: 50px;" bgcolor="#FFD31C">
                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                             <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px;" class="mobile-center">
                                <!-- Middle column with the image -->
                                <img src="{{ asset('assets/img/logo.jpg') }}" style="width:250px; display: block; margin: 0 auto;" />
                            </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                password Reset
                            </h2>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">

                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                            <p>
                                 <p style="text-align:justify">You are receiving this mail because we received a password reset request for your account.</p>
                                <a href="{{ route('validateresetpassword', ['token' => $token]) }}"
                                   style="background-color:#212529; color: #ffffff; padding: 10px 20px; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px; display: inline-block;text-align: center">
                                   Reset Password
                                </a>
                                <p style="text-align:justify">This password reset link will expire in 60 minutes.
                                </p>
                                <p style="text-align:justify">If you did not request a password reset no further action is required.</p>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                             <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                If you have any questions or require further assistance, please don't hesitate to contact us at contact@airparq.co.uk or +44 7464 777258.
                            </p>
                            <p>Thank you</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center">
                                     <img
                                        src="{{ asset('assets/img/logo.jpg') }}"
                                         style="display: block; border: 0px;height:20px"
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        Thomas House, <br>
                                        Petersfield Avenue,<br>
                                        Slough,<br>
                                        SL2 5EAe<br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
</body>
</html>
