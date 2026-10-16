let total = 0;
let count = 0;

function addCalories() {
  let val = Number(document.getElementById("calories").value);
  total += val;
  count++;

  let msg = "";
  if (total <= 800) {
    msg = "You’re off to a healthy start!";
  } else if (total <= 1600) {
    msg = "Good progress, keep it balanced!";
  } else if (total <= 1999) {
    msg = "Almost at your limit!";
  } else {
    msg = "Goal reached! Stay mindful!";
  }

  if (count > 10 && total < 2000) {
    msg = "Be cautious of frequent snacking!";
  }

  document.getElementById("total").innerText = "Total Calories: " + total;
  document.getElementById("entries").innerText = "Entries: " + count;
  document.getElementById("feedback").innerText = msg;
}
