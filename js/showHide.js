var a;
function show_hide(i){
    if(a==1){
        document.getElementById("container_drop"+i).style.display="none";
        return a=0;
    }
    else{
        document.getElementById("container_drop"+i).style.display="grid";
        return a=1;
    }

}