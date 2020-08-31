<style>
    #clockcontainer{
            position: relative;
            margin: auto;
            height: 20vw;
            width: 20vw;
            background: url(../images/clock.png) no-repeat;
            background-size: 100%;
           
        }
       
        #hour,#minute,#second{
            position: absolute;
            background: black;
            border-radius: 10px;
            transform-origin: bottom;
            
        }
        #hour{
            width: 3%;
    height: 19%;
    top: 31%;
    left: 47.4%;
   
           
        }
        #minute{
            width: 1.5%;
    height: 32%;
    top: 18%;
    left: 48.3%;
   
            
        }
        #second{
            width: 0.9%;
    height: 47%;
    top: 3%;
    left: 48.6%;
            
        }
</style>
<div id="clockcontainer" class="float-left">
      <div id="hour"></div>
      <div id="minute"></div>
      <div id="second"></div>
  </div>
  <script>
      setInterval(()=>{
          d= new Date();
          htime=d.getHours();
          mtime=d.getMinutes();
          stime=d.getSeconds();
        // console.log(htime,mtime,stime);
        hrotation= 30*htime+mtime/2;
        mrotation= 6*mtime;
        srotation=6*stime;
        hour.style.transform =  `rotate(${hrotation}deg)`;
        minute.style.transform =  `rotate(${mrotation}deg)`;
        second.style.transform =  `rotate(${srotation}deg)`;

      },1000);
   
  </script>