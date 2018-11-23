<html>
<head>
    <title>Verification Complete</title>
</head>
<style>
    html,body{
        height: 100%;
        width: 100%;
        background-color: #7f8c8d;
    }
    body{
        display: flex;
        align-items: center;
        justify-content: center
    }
    .container{
        background-color: #ecf0f1;
        padding: 30px;
    }
</style>
<body>
<div class="container">
    <div>Your account has been verified<div>
            <div>You will be redirect to login page in 5 seconds</div>
</div>
<script>
    window.setTimeout(function () {
        window.location.href = '/login';
    },5000);
</script>
</body>
</html>