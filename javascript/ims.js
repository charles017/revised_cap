let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let searchBtn = document.querySelector(".bx-search")

btn.onclick = function(){
    sidebar.classList.toggle("active");
}
searchBtn.onclick = function() {
    sidebar.classList.toggle("active");
}


function userLogout() {
    alert("You are now logging out of the system!")
    window.location.assign("index.html");
    localStorage.setItem('currentUser', '');
 }
