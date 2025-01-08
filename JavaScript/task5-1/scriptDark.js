window.onload = function() {
    let mode = sessionStorage.getItem("themeMode");

    if (mode) {
        document.body.classList.add(mode);
    } else {
        document.body.classList.add("light-mode");
    }
};

function toggleMode() {
    if (document.body.classList.contains("light-mode")) {
        document.body.classList.remove("light-mode");
        document.body.classList.add("dark-mode");
        sessionStorage.setItem("themeMode", "dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
        document.body.classList.add("light-mode");
        sessionStorage.setItem("themeMode", "light-mode");
    }
}
