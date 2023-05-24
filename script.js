let count = 0;
run = () =>{
    let image;
    let imagesarry = document.querySelectorAll(".imgs");
    for (image = 0 ; image < imagesarry.length ; image++){
        imagesarry[image].style.opacity = '0';
        imagesarry[image].style.transition = '.8s';
    }
    count++;
    if(count > imagesarry.length){
        count = 1;
    }
    imagesarry[count - 1].style.opacity = '1';
}

setInterval(run,5000);

var bar=document.getElementById('bar');
var flag=0;
bar.addEventListener('click', function(){
    if(flag==0){
    document.getElementsByClassName('info-content')[0].style.display='block';
        flag++;
    }else{
    document.getElementsByClassName('info-content')[0].style.display='none';
        flag--;
    }
});

let slide = document.querySelector('#box');





function change(cost){
    // console.log(cost);

    
    var member=booking.family_member.value;
    booking.cost.value=cost*member;
    console.log(member);
}


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


