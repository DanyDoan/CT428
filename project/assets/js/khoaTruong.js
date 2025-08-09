// Sử dụng kỹ thuật AJAX để lấy toàn bộ /mã trường/ & /tên trường/ để gán option
function danhSachKhoaTruong(){
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controllers/khoaTruong.php", false);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();    


    const res = (xhttp.responseText);
    return JSON.parse(res);
}


// Trả về một thẻ td có dạng
//  <td>
//      <select>
//          <option>...</option>
//      </select>
// </td>

function ganDanhSachKhoaTruong() {
    let ds = danhSachKhoaTruong();
    let output = "<td><select name='maKhoaTruong'>";
    for (let truong of ds) 
        output += "<option value='" + truong.maKhoaTruong + "'>" + truong.tenKhoaTruong+ "</option>";
    output +="</select></td>";
    return output;
}

