const navtoggler = document.querySelector(".navbar-toggler");
const navcollapse = document.querySelector(".navbar-collapse").style;

navtoggler.onclick = () => {
    navcollapse.display = navcollapse.display === "none" ? "flex" : "none";
}
