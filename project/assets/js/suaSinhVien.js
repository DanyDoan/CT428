function suaSinhVien(data) {
    data = JSON.parse(data);
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        // try {
            let output = JSON.parse(xhttp.responseText);
            try{
                document.getElementById("anounceBox").innerHTML = "<h2>"+output["message"]+"</h2>";
            }catch(e){}
            hienThiSinhVien(output["data"]);
    };

    xhttp.open("POST", "../controllers/suaSinhVien.php");
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.send(JSON.stringify(data));
}

