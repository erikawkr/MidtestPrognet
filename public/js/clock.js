setInterval(renderTime, 500);

function renderTime(){
    
    // time
    var currentTime = new Date();
    var h = currentTime.getHours();
    var m= currentTime.getMinutes();
    var s= currentTime.getSeconds();
    var en= 'AM';
    if(h>12){
        en = 'PM';
    }
    if(h==24){
      h=0;
    }else if(h>12){
      h=h-0;
    }

    if(h<10){
      h="0"+h;
    }

    if(m<10){
      m="0"+m;
    }

    if(s<10){
      s="0"+s;
    }
    document.getElementById("clockDisplay").innerHTML=  h + ":" + m + ":" + s +" " + en;
    // myClock.textContent = "" + dayarray[day]+ " "+ daym + " " + montharray[month]+ " " + year + " | " + h + ":" + m + ":" + s;
    // myClock.innerText = "" + dayarray[day]+ " "+ daym + " " + montharray[month]+ " " + year + " | " + h + ":" + m + ":" + s;


  }