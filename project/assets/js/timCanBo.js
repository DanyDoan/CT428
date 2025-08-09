function timCanBo() {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
            let danhSachCanBo = JSON.parse(this.responseText);
            hienThiCanBo(danhSachCanBo);
    };

    formData = new FormData(document.getElementById("searchBar"));
    
    xhttp.open("POST", "../controllers/timCanBo.php");
    xhttp.send(formData);
}
