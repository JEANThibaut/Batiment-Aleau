let acc = document.getElementsByClassName("accordion");
let i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");

    let panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

function date(){
  let date= new Date();
  let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date);
  let mo = new Intl.DateTimeFormat('fr', { month: 'short' }).format(date);
  let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date);
  let newDate="Nous sommes le "+da+" "+mo+" "+ye+" ";  
  document.getElementById('date').innerHTML=newDate;
  // document.getElementById('hours').innerHTML="Il est: "+date.getHours()+":"+date.getMinutes();
}
date();