<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/headers.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/register.css">
    <title>REGISTER</title>
</head>
<body>
    <section class="logos">
        <div class="logo">
            <img src="../../public/img/logo.svg" alt="Golden Oaks">
        </div>
        <div class="logo_subtext">
            <img src="../../public/img/logo_2.svg" alt="Decentralized Book Exchange">
        </div>
    </section>
    <section class="registration_container">
        <h1>Register</h1>
        <form class="register" action="register" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input id="input_fields" name="email" type="text" placeholder="email@email.com">
            <input id="input_fields" name="password" type="password" placeholder="password">
            <input id="input_fields" name="name" type="text" placeholder="name">
            <input id="input_fields" name="surname" type="text" placeholder="surname">
            <button type="submit">REGISTER</button>
        </form>
    </section>
</body>