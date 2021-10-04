window.onload = function () {
  var today = new Date();
  
  for(let i = 1; i <= 31; i++){
    if (today.getMonth() + 1 == i) {
      document.getElementById("month").value = i.toString();
    }
    if (today.getDay() == i) {
      document.getElementById("day").value = i.toString();
    }
  }
  
}