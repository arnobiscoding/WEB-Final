let hrList = [];
let spo2List = [];

function saveReading() {
  let hr = Number(document.getElementById("hr").value);
  let spo2 = Number(document.getElementById("spo2").value);

  hrList.push(hr);
  spo2List.push(spo2);

  let totalHr = 0;
  for (let i = 0; i < hrList.length; i++) {
    totalHr += hrList[i];
  }
  let avgHr = totalHr / hrList.length;

  let totalSpo2 = 0;
  for (let i = 0; i < spo2List.length; i++) {
    totalSpo2 += spo2List[i];
  }
  let avgSpo2 = totalSpo2 / spo2List.length;

  let risk = (100 - spo2) * 2 + Math.abs(hr - 80) * 0.5;

  let feedback = "";
  if (risk <= 10) {
    feedback = "SAFE";
  } else if (risk <= 20) {
    feedback = "WARNING";
  } else {
    feedback = "DANGER";
  }

  document.getElementById("avgHr").innerText = "Average Heart Rate: " + avgHr;
  document.getElementById("avgSpo2").innerText = "Average SpO2: " + avgSpo2;
  document.getElementById("risk").innerText = "Risk Score: " + risk;
  document.getElementById("feedback").innerText = "Feedback: " + feedback;
}
