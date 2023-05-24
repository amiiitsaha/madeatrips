var toggle=0;
function side_bar(){
    console.log("hello");
    if(toggle == 0){
    document.getElementById("toggle-bar").style.width="300px";
    toggle++;
    }else{
    document.getElementById("toggle-bar").style.width="0px";
        toggle--;
    }
}