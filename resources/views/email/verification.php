<html style="width:100%;
        height: 100%;
        background-color: #bdc3c7;">
<head>
    <title>Email</title>
</head>

<body style="display: flex;
        align-items: center;
        justify-content: center;">
<div style="">

    <div>Please click the link below to verify your account</div>
    <div style="margin-top: 20px;text-align: center;"><a href="<?php echo env('APP_URL', 'localhost:9000') ?>/verifyUser/<?php echo $id ?>/<?php echo $code ?>">Verify You Account</a></div>
</div>
</body>
</html>