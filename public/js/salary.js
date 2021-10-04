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
      document.getElementById("mail").value = users[user].email;
      document.getElementById("user").value = users[user].id;
    }
  }

}

function change() {
  let salary = document.getElementById("time1").value / 60 * 1200 +
    document.getElementById("time2").value / 60 * 1000 +
    document.getElementById("time3").value / 60 * 992;
  document.getElementById("salary").value = salary;

  for (let route in routes) {

    if (routes[route].classroom_id == document.getElementById("room_name").value &&
      routes[route].user_id == document.getElementById("user").value) {
      if (routes[route].user_id == current_user) {
        document.getElementById("from").value = routes[route].from;
        document.getElementById("to").value = routes[route].to;
        document.getElementById("expenses").value = routes[route].price;
      }

    }
  }
}

function register_classroom() {

  if (!(document.getElementById("from").value == "") && !(document.getElementById("to").value == "") && !(document.getElementById("expenses").value == "")) {
    for (let user in users) {
      if (users[user].id == document.getElementById("user").value) {
        document.getElementById("user_hidden").value = users[user].id;
      }
    }

    for (let classroom in classrooms) {
      if (classrooms[classroom].id == document.getElementById("room_name").value) {
        document.getElementById("room_name_hidden").value = classrooms[classroom].id;
      }
    }

    // document.getElementById("user_hidden").value = document.getElementById("user").value;
    // document.getElementById("room_name_hidden").value = document.getElementById("room_name").value;
    document.getElementById("from_hidden").value = document.getElementById("from").value;
    document.getElementById("to_hidden").value = document.getElementById("to").value;
    document.getElementById("expenses_hidden").value = document.getElementById("expenses").value;
    document.getElementById("hidden_form").submit();
  }
  else {
    alert("出発駅、到着駅、交通費を正しく入力してください");
  }


}
