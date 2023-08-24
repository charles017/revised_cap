document.getElementById("searchIcon").addEventListener("click", function () {
    searchRedirect();
});

document.getElementById("searchInput").addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        searchRedirect();
    }
});

function searchRedirect() {
    const searchQuery = document.getElementById("searchInput").value.toLowerCase();

    const keywords = {
        "dashboard": "index.html", // Add other keywords and URLs here
        "delivery receipt": "dr.html",
        "stock receipt": "sr.html",
        "stock card": "stockcard.html",
        "customers": "customer.html",
        "reports": "#", // Update with the actual URL
        "orders": "Orders.html",
        "accounts": "messages.html"
    };

    if (keywords.hasOwnProperty(searchQuery)) {
        const url = keywords[searchQuery];
        if (url !== "#") {
            window.location.href = url;
        } else {
            alert("Reports page URL not available");
        }
    } else {
        alert("Keyword not found");
    }
}

