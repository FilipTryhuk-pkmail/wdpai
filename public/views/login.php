<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class ="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="logo_subtext">
            <img src="public/img/logo_2.svg">
        </div>
        <div class="login-container">
            <form class="login_2" action="login_2" method="POST">
                <div class="message">
                    <?php
                        if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <div class="login_info">
                    Log in to the site
                </div>
                <div class="login_password">
                    user login
                </div>
                <input name="email" type="text" placeholder="your.email@here" style="
                border: 1px solid #000000;
                border-radius: 30px;
                background-color: transparent;
                padding: 0.25em;
                margin: 0.25em;
                font-family: 'Ubuntu';
                font-style: normal;
                color: rgba(0, 0, 0, 1);
            ">
                <div class="login_password">
                    password                    
                </div>                
                <input name="password" type="password" placeholder="**********" style="
                border: 1px solid #000000;
                border-radius: 30px;
                background-color: transparent;
                padding: 0.25em;
                margin-top: 0.25em;
                color: rgba(0, 0, 0, 1);
            ">
                <button type="submit">
                    <div class="button_text">
                        CONTINUE
                    </div>
                </button>
            </form>
        </div>
    </div>
</body>