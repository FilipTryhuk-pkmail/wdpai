<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/history.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/wishlist.css">
    <title>WISHLIST</title>
</head>

<body>
<div class ="base-container" >
    <header>
        <div class="top_row">
            <div class="small_logo">
                Golden Oaks
            </div>
            <div class="username">
                Hello, user!
            </div>
        </div>
    </header>
    <main>
        <div>
            <ul class="page_bar">
                <li>
                    <a href="#" class="selection_buttons">My account</a>
                </li>
                <li>
                    <a href="#" class="selection_buttons">Collection</a>
                </li>
                <li>
                    <a href="#" class="selection_buttons">History</a>
                </li>
                <li>
                    <a href="#" class="selection_buttons">Wishlist</a>
                </li>
            </ul>
        </div>
            <section class="upload_form">
                <h1>UPLOAD</h1>
                <form action="../../src/controllers/WishlistController.php" method="POST" ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="Title" type="text" placeholder="list">
                    <textarea name="description" rows="3" placeholder="description"></textarea>
                    <input type="file" name="file">
                    <button type="submit">Send!</button>
                </form>
            </section>
        </main>
    </div>
</body>