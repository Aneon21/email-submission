const sbmtBtn = document.getElementById('submitbutton');
const inpTxt = document.getElementById('emailID');

window.onload = function(){
    inpTxt.value = "";
}

inpTxt.addEventListener('keyup', (e) => {
    const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    const check = document.getElementById("emailCheck");
    const value = e.currentTarget.value;

    if(value != ""){
        
        if(value.match(pattern)){
            check.innerText = "";
            sbmtBtn.disabled = false;
        }
        else{
            check.innerText = "Enter a valid email";
            sbmtBtn.disabled = true;
        }
    }
    else{
        check.innerText = "";
    }
    
});
