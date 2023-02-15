<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/history.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/book_cover.css">
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
                    <a href="logout" class="selection_buttons">Log out</a>
                </li>
                <li>
                    <a href="books" class="selection_buttons">Collection</a>
                </li>
                <li>
                    <a href="history" class="selection_buttons">History</a>
                </li>
                <li>
                    <a href="cover_upload" class="selection_buttons">Upload</a>
                </li>
            </ul>
        </div>
            <section class="upload_form">
                <h1>UPLOAD</h1>
                <form action="../../src/controllers/BookCoverController.php" method="POST" ENCTYPE="multipart/form-data">
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