const search = document.querySelector("input[placeholder='Type to start searching']");
const bookContainer = document.querySelector(".books");

search.addEventListener("keyup", function(event) {
    if(event.key === "Enter") {
        event.preventDefault();
        const data = {search: this.value};
        fetch("/search", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (books) {
            bookContainer.innerHTML = "";
            loadBooks(books);
        });
    }
});

function loadBooks(books) {
    books.forEach(book => {
        console.log(book);
        createBook(book);
    })
}

function createBook(book) {
    const template = document.querySelector("#project_template");
    const clone = template.content.cloneNode(true);
    const title = clone.querySelector("h2");
    title.innerHTML = book.title;
    const author = clone.querySelector("p");
    author.innerHTML = book.author;
    const publishing_date = clone.querySelector("a");
    publishing_date.innerHTML = book.publishing_date;

    bookContainer.appendChild(clone);
}