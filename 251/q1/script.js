let attempts = 0;

function checkPassword() {
  let pass = document.getElementById("pass").value;
  attempts++;

  let score = 0;
  if (pass.length >= 6) {
    score += Math.floor((pass.length - 6) / 2) * 10;
  }
  if (/[A-Z]/.test(pass)) score += 15;
  if (/[a-z]/.test(pass)) score += 15;
  if (/[0-9]/.test(pass)) score += 20;
  if (/[!@#$%^&*]/.test(pass)) score += 25;

  let level = "";
  if (score <= 30) level = "Very Weak";
  else if (score <= 50) level = "Weak";
  else if (score <= 70) level = "Medium";
  else if (score <= 90) level = "Strong";
  else level = "Very Strong";

  if (score >= 100) {
    level = "Perfect Password!";
  }

  document.getElementById("result").innerText = "Score: " + score + " | Level: " + level;
  document.getElementById("attempts").innerText = "Attempts: " + attempts;

  if (attempts > 8 && score < 71) {
    document.getElementById("warning").innerText = "Need practice!";
  } else {
    document.getElementById("warning").innerText = "";
  }
}
