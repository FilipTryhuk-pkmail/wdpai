<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/headers.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/book_display.css">
    <script type="text/javascript" src="../../public/js/search.js" defer></script>
    <title>BOOKS</title>
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
        <div class="search-bar">
            <input placeholder="Type to start searching">
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
</body>

<template id="project_template">
    <div>
        <h2>title</h2>
        <p>author</p>
        <p>publishing_date</p>
    </div>
</template>