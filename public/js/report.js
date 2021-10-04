window.onload = function() {
  var today = new Date();

  for (let i = 1; i <= 31; i++) {
    if (today.getMonth() + 1 == i) {
      document.getElementById("month").value = i.toString();
    }
    if (today.getDate() == i) {
      document.getElementById("day").value = i.toString();
    }
  }

  for (let i = 0; i < 6; i++) {
    document.getElementById(i).style.display = "none";
  }

  for (let user in users) {
    if (users[user].id == current_user) {
      document.getElementById("user").value = users[user].id;
    }
  }

}

function change() {
  if (document.getElementById("DAC")) {
    let dacValue = document.getElementById("DAC").value;
    if (dacValue == "終了") { //終了報告のとき
      for (let i = 0; i < 6; i++) {
        document.getElementById(i).style.display = "";
      }
    }
    else { //終了報告じゃないとき
      for (let i = 0; i < 6; i++) {
        document.getElementById(i).style.display = "none";
      }
    }
  }
}
