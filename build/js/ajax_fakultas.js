var ajaxku=buatajax();
function ajaxfakultas(id){
  var url="select_jurusan.php?fak="+id+"&sid="+Math.random();
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}



function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kota").innerHTML = data
    }else{
      document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    }
    document.getElementById("kab_box").style.display='table-row';
    document.getElementById("kec_box").style.display='none';
    document.getElementById("kel_box").style.display='none';
    document.getElementById("lat_box").style.display='none';
    document.getElementById("lng_box").style.display='none';
  }
}

