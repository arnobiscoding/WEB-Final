let totalHours = 0;
let sessions = 0;
let subjects = [];

function addSession() {
  let subject = document.getElementById("subject").value;
  let hours = Number(document.getElementById("hours").value);

  totalHours += hours;
  sessions++;
  subjects.push(subject);

  let average = totalHours / sessions;

  let msg = "";
  if (totalHours <= 5) {
    msg = "Start studying regularly!";
  } else if (totalHours <= 12) {
    msg = "Good progress!";
  } else if (totalHours <= 19) {
    msg = "Almost ready!";
  } else {
    msg = "Weekly goal reached!";
  }

  if (sessions > 7 && totalHours < 20) {
    msg = "Increase your study time!";
  }

  document.getElementById("total").innerText = "Total Hours: " + totalHours;
  document.getElementById("average").innerText = "Average Hours: " + average;
  document.getElementById("subjects").innerText = "Subjects: [" + subjects.join(", ") + "]";
  document.getElementById("feedback").innerText = msg;
}
