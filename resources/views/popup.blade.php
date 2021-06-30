<!DOCTYPE html> 
<html lang="en"> 
<head>
       <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/popup.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@300&display=swap');
    .formFrame {
        position: absolute;
        left: -5000px;
    }
    
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  margin: 0px;
  padding: 25px;
  min-height: 100%;
  height:100%;
  widht: 100%;
  font-family: 'Open Sans', sans-serif;
  -webkit-box-shadow: inset 0px 0px 0px 5px rgba(224,224,224,1);
  -moz-box-shadow: inset 0px 0px 0px 5px rgba(224,224,224,1);
  box-shadow: inset 0px 0px 0px 5px rgba(224,224,224,1);
}

section{
  height: 50px;
  position: relative;
  width: 350px;
  margin: 0px auto;
  text-align: center;
}

.trigger{
  color: #EEE;
  background-color: darkgrey;
  font-size: 1.3em;
  padding: 10px;
  display: block;
  -webkit-box-shadow: 2px 2px 0px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: 2px 2px 0px 0px rgba(0,0,0,0.75);
  box-shadow: 2px 2px 0px 0px rgba(0,0,0,0.75);
  transition: all .2s;
  &:hover{
    -webkit-box-shadow: 5px 5px 0px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 5px 5px 0px 0px rgba(0,0,0,0.75);
     box-shadow: 5px 5px 0px 0px rgba(0,0,0,0.75);
    transition: all .2s;
  }
  
  &.top{
    &.full{
      background-color: #2ecc71;
      transition: all .2s; 
      &:hover{
        background-color: #27ae60; 
        transition: all .2s;
      }
    }
    &.high{
      background-color: #e67e22;
      transition: all .2s; 
      &:hover{
        background-color: #d35400; 
        transition: all .2s;
      }
    }
  }
  
  &.bottom{
    &.full{
      background-color: #3498db;
      transition: all .2s; 
      &:hover{
        background-color: #2980b9; 
        transition: all .2s;
      }
    }
    &.high{
      background-color: #e74c3c;
      transition: all .2s; 
      &:hover{
        background-color: #c0392b; 
        transition: all .2s;
      }
    }
  }
}

.cookie-banner{
  display: none;
  height: auto;
  position: fixed;
  padding:4px 3%;
  background-color: #eee;
  -webkit-transition-timing-function: ease-in; 
  transition-timing-function: ease-in;
  
  &.bottom{
    display: block;
    border-top: 2px solid #9C7E48;
    bottom: -350px;
    transition: bottom .5s;
    &.show{
      
      bottom: 0;
      transition: bottom 1s;
      -webkit-transition-timing-function: ease-in; 
      transition-timing-function: ease-in;
    }
  }
  &.top{
    display: block;
    border-bottom: 2px solid #9C7E48;
    top: -350px;
    transition: top .5s;
    &.show{
      top: 0;
      margin-top: 0px;
      transition: top 1s;
      -webkit-transition-timing-function: ease-in; 
      transition-timing-function: ease-in;
    }
  }
  
  &.full{
    left: 0;
    margin:0px;
    width: 100%;
  }
  &.highlight{
    margin: 0x 25px 0px 0px;
    height: auto;
    width: auto;
    -webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.55);
    -moz-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.55);
    box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.55);
    &.top.show{
      top: 25px;
    }
    &.bottom.show{
      bottom: 25px;
    }
  }
  
}

.cookie-banner p{
  float: left;
  width: 80%;
  display: inline-block;
}

.cookie-banner .button{
  float: left;
  margin: 15px;
  width: 100px;
  height: 40px;
  z-index: 100;
  background: #900B23;
  text-transform: uppercase;
  line-height: 28px;
  padding-top: 8px;
  display: inline-block;
  color: #FFF;
  text-align: center;
  text-decoration: none;
}
</style>
</head>

<body>
    <h1>Helloooo</h1>
    <!-- iframe to handle form submission -->
    <iframe name="formDestination" style="position: absolute; left: -5000px"></iframe>
    
    <!-- cookie banner -->
    <div class="banner-wrapper">
    <div id="cookie-banner" class="cookie-banner full bottom">
      <p>To give you the best possible experience, this website uses cookies. <br />Continuing navigation on <em>example.com</em> means you agree to our use of cookies.</p>
      <a class="button" href="#">OK</a>
    </div>
  </div>
  
  <!-- form -->
     <div id="popup-overlay" class="popup-hide">
  <div id="popup-circle">
     <div id="close-wrap">
       <a href="#" id="close"><i class="fa fa-close"></i></a>
     </div>
    <article class="rect">
         <h1>Presenting The Class of...</h1>
         <p style="font-size: 30px;">Subscribe to Our Newsletter!</p>  
         <p>Trust us we hate spamming, <br> you will get delightful emails</p>  
        <form method="post" target="formDestination" action="{{ route('interested') }}">
            {{ csrf_field() }}
            <input type="text" name="first_name" maxlength="30" placeholder="first"><br>
            <input type="text" name="last_name" maxlength="30" placeholder="last"><br>
            <input type="email" name="email" maxlength="30" placeholder="Drop  your email"><br>
            <input type="submit" id="submit" name="submit" value="Subscribe">
        </form>
         
          <!--<aside id="popup-drawer">-->
          <!--    <a href="#"><i class="fa fa-chevron-right"></i></a>-->
          <!--</aside>-->
    </article>  
  </div>
</div>
<script>
     $(document).ready(function(event){
      function loadPopup(event){
            if($("#popup-overlay").hasClass("popup-hide")){
                $("#popup-overlay").removeClass("popup-hide");
            }else{
                $("#popup-overlay").addClass("popup-show");
            }
      }
       setTimeout(loadPopup, 1000);
          
        $("#close").click(function(e){
            $('#popup-overlay').addClass("popup-hide");
            e.preventDefault();
        })
        
        $("#submit").click(function(e){
            $('#popup-overlay').addClass("popup-hide");
        })
    });
    
    $(document).ready(function(){
  //For page load
  $('#cookie-banner').toggleClass('show');
  
  //Hide banner
  $('.cookie-banner .button').click(function(){
    $('#cookie-banner').removeClass('show');
  });
    // banner hide
    $('#show-bottom-full').click(function(){
    $('#cookie-banner').removeClass();
    $('#cookie-banner').addClass('cookie-banner');
    $('#cookie-banner').addClass('full');
    $('#cookie-banner').addClass('bottom');
    setTimeout(function(){
      $('#cookie-banner').addClass('show');
    }, 100);});});
</script>
</body>