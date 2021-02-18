var a;
function show_hide(){
    if(a==1){
        document.getElementById("container_drop").style.display="none";
        return a=0;
    }
    else{
        document.getElementById("container_drop").style.display="grid";
        return a=1;
    }
}