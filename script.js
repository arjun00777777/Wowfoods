var searchButton = document.getElementById("searchButton");
searchButton.addEventListener("click", function (event) {
  var searchResponse = document.getElementById("search").value.toLowerCase();
  if (searchResponse === "pizza") {
    event.preventDefault();
    window.location.href = "#pizza";
  } else if (searchResponse === "noodles") {
    event.preventDefault();
    window.location.href = "#noodles";
  } else {
    alert("Item Not Available");
    event.preventDefault();
  }
});


