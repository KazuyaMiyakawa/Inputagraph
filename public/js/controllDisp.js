function showOrHide(name){
  if (document.getElementById(name).style.display == "block"){
    document.getElementById(name).style.display="none";
  } else {
    for (var element of document.getElementsByClassName('hide-field')) {
      element.style.display="none";
    }
    document.getElementById(name).style.display="block";
  }
}
