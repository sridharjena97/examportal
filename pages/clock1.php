<style>
    *{
        padding: 0px;
        margin: 0px;
    }
    #clockcontainer{
            position: relative;
            margin: auto;
            height: 20vw;
            width: 7vw;
            background: url(images/clock.png) no-repeat;
            background-size: 100%;
           
        }
       
        #hour,#minute,#second{
            position: absolute;
            background: black;
            border-radius: 10px;
            transform-origin: bottom;
            /* border: 2px solid red; */
        }
        #hour{
            width: 3%;
    height: 10%;
    top: 7%;
    left: 47.4%;
   /* display: none; */
           
        }
        #minute{
            width: 1.5%;
    height: 12%;
    top: 5%;
    left: 48.4%;
    /* display: none; */
            
        }
        #second{
            width: 0.9%;
    height: 15%;
    top: 2%;
    left: 48.6%;
         /* display: none;    */
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