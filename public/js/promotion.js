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

  for (let user in users) {
    if (users[user].id == current_user) {
      document.getElementById("user").value = users[user].id;
    }
  }

}
