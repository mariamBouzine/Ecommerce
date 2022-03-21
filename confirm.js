var new_adress = document.getElementById("newAdress")
function adress_click(btn){
    if(btn.value == "no"){
        new_adress.style.display="none";
        // alert("no");
    }
    else{
        new_adress.style.display="block";
        // alert("yes");
    }
}