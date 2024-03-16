<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bite_Blitz">
    <meta name="author" content="Bite_Blitz">
    <title>Your OTP for forgot password.</title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: 'Roboto', sans-serif;
        }

        span {
            font-family: 'Roboto', sans-serif;
            padding: 8px 0px 0px 0px;
            color: #465280;
            font-size: 14px;
            line-height: 22px;
            margin: 0px;
            "

        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <table role="presentation"
        style="width: 100%; border-collapse: collapse; border: 0; border-spacing: 0; background: #F8F5F4;">
        <tr>
            <td align="center" style="padding: 0;">
                <table role="presentation"
                    style="width: 602px; border-collapse: collapse; border: 1px solid #cccccc; border-spacing: 0; text-align: left;">
                    <tr>
                        <td align="center" style="padding: 20px 20px 10px 30px; background: #ffffff;">
                            <img src="img/ealogo.png" alt="" width="140"
                                style="height: auto; display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 40px 30px 40px; background: #FAFBFD;">
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; border: 0; border-spacing: 0;">
                                <tr>
                                    <td style="padding: 0 0 0px 0; color: #153643;">
                                        <h1
                                            style="font-family: 'Roboto', sans-serif; padding: 8px 0px 10px 0px; color: #465280; font-size: 20px; line-height: 18px; margin: 0px; text-transform: capitalize; font-weight: bold ">
                                            Dear {{ $user->name }},
                                        </h1>

                                        <p
                                            style="padding: 8px 0px 10px 0px; font-size: 12px; line-height: 14px; margin: 0px;">
                                            You have requested to reset your password. Please use the following OTP
                                            (One-Time Password) to verify your identity and proceed with resetting your
                                            password:
                                            <br>
                                        </p>

                                        <p
                                            style="font-family: 'Roboto', sans-serif; padding: 8px 0px 0px 0px; color: #465280; font-size: 22px; line-height: 18px; margin: 0px; text-align: center">
                                            OTP : <strong> {{ $user->otp }}</strong>
                                        </p>
                                        <br>

                                        <p
                                            style="padding: 8px 0px 10px 0px; font-size: 12px; line-height: 14px; margin: 0px; text-align: left;">
                                            Please note that this OTP will expire after 180 seconds. <br>
                                            If you did not request this password reset, please ignore this email.
                                        </p><br>

                                      
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
