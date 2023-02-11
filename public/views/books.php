<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/search.ks/js" defer></script>
    <title>BOOKS</title>
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
            <div class="search-bar">
                <input placeholder="Type to start searching">
            </div>
        </header>
        <main>
            <div>
                <ul>
                    <li>
                        <a href="#" class="selection_buttons">My account</a>
                        <a href="#" class="selection_buttons">Collection</a>
                        <a href="#" class="selection_buttons">History</a>
                        <a href="#" class="selection_buttons">Wishlist</a>
                    </li>
                </ul>
            </div>
            <div class="Hbox">
                <?php foreach ($books as $book): ?>
                <div>
                    <h2><?= $book->getTitle(); ?> </h2>
                    <p><?= $book->getAuthor(); ?> </p>
                    <p><?= $book->getPublishingDate(); ?> </p>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>

<template id="project_template">
    <div>
        <h2>title</h2>
        <p>author</p>
        <a>publishing_date</a>
    </div>
</template>