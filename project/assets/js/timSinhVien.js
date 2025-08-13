function timSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let output = JSON.parse(this.responseText);
                document.getElementById("anounceBox").innerHTML = "<h2>"+output["soLuong"]+"</h2>";
        hienThiSinhVien(output.data);
    }
    let formData = new FormData(document.getElementById("searchBar"));;
    if (JSON.parse(localStorage.getItem("maLop")) != null){
        const maLop = JSON.parse(localStorage.getItem("maLop"));
        formData = new FormData();
        formData.append("searchingField", "maLop");
        formData.append("fieldValue", maLop);
        localStorage.removeItem("maLop");
    }
    else{
        formData = new FormData(document.getElementById("searchBar"));
    }
    xhttp.open("POST", "../controllers/timSinhVien.php");
    xhttp.send(formData);
}