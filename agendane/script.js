  function addZero(i) {
        if (i < 10) {i = "0" + i}
            return i;
    }
                    
    setInterval(customClock, 500);
  function customClock() {
       var time = new Date();
       var hrs = addZero(time.getHours());
       var min = addZero(time.getMinutes());
       var sec = addZero(time.getSeconds());
            	       
        document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;
            	       
    }