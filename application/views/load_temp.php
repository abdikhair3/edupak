
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Load Page</title>

<script src="<?php echo base_url()?>assets/dist/js/jquery-3.5.1.min.js"></script>
<style type="text/css">
#mdb-preloader.loaded {
  opacity: 0;
  transition: .3s ease-in 1s;
}
</style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <progress min="0" max="100" id="loader" value="10" ></progress>
    <img src="https://wallpaperaccess.com/full/87699.jpg" />

<script>
        var i = 10 ;
        
     var scroll =  setInterval(()=>{
        i += .5 ;
        document.getElementById("loader").setAttribute("value",i) 
     },1200);  
                 
 window.onload= function(){
 
  clearInterval(scroll);

setTimeout(()=>{   document.getElementById("loader").setAttribute("value","100");
 },50)
 setTimeout(()=>{     document.getElementById("loader").style.display ="none";
 },1000);
 

         }
     </script>
</body>
</html>
