function showPautas(ass_id) {
    if (ass_id == 0) {
        alert("Selecione uma assembléia!");
        return;
    } else {
        let http_request = new XMLHttpRequest();
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                let http_response = http_request.responseText;
                document.getElementById('div-table').innerHTML = http_response;
            }
        };
        http_request.open("GET", "getPauta.php?ass_id=" + ass_id, true);
        http_request.send();
    }
}