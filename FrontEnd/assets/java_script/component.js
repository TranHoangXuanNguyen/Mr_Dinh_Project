// JS để xử lý header 
window.addEventListener("scroll", function() {
    let header = document.querySelector(".header");
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

// Hàm để load nội dung từ file HTML vào phần tử có id tương ứng
function includeHTML(id, file) {
    fetch(file)
        .then(response => response.text())
        .then(data => {
            document.getElementById(id).innerHTML = data;
        })
        .catch(error => console.error(`Error loading ${file}:`, error));
}

// Gọi hàm để chèn Header và Footer vào các trang
document.addEventListener("DOMContentLoaded", function() {
    includeHTML("header-placeholder", "pages/component/header.html");
    includeHTML("footer-placeholder", "pages/component/footer.html");
});
