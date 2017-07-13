<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="3;{{url('/Dashboard')}}">
        <title>Laravel</title>
        <link rel="stylesheet" href="css/style.css">

        <!-- Styles -->
        <style>

@import url(https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff|Lato:300,400,700|Montserrat:400,700&amp;subset=latin-ex);

/* ------------------------------------------------------------------------
 Loader
 ------------------------------------------------------------------------ */

#loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}
#loader-wrapper .loader-section.section-left {
    left: 0;
}
#loader-wrapper .loader-section.section-right {
    right: 0;
}
#loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 51%;
    height: 100%;
    background: #FFF;
    z-index: 1000;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
}
.loaded #loader-wrapper .loader-section.section-left {
    -webkit-transform: translateX(-100%);
    -moz-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    -o-transform: translateX(-100%);
    transform: translateX(-100%);
    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -moz-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -ms-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -o-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}
.loaded #loader-wrapper .loader-section.section-right {
    -webkit-transform: translateX(100%);
    -moz-transform: translateX(100%);
    -ms-transform: translateX(100%);
    -o-transform: translateX(100%);
    transform: translateX(100%);
    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -moz-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -ms-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    -o-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}
.loaded #loader-wrapper {
    visibility: hidden;
    -webkit-transform: translateY(-100%);
    -moz-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    -o-transform: translateY(-100%);
    transform: translateY(-100%);
    -webkit-transition: all 0.3s 1s ease-out;
    -moz-transition: all 0.3s 1s ease-out;
    -ms-transition: all 0.3s 1s ease-out;
    -o-transition: all 0.3s 1s ease-out;
    transition: all 0.3s 1s ease-out;
}
/*  loader */

.square-container {
    height: 80px;
    width: 170px;
    position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    margin: auto;
    z-index: 1001;
}
.loaded .square-container {
    visibility: hidden;
}
.square {
    height: 80px;
    width: 170px;
    animation: snake 5s linear infinite;
    display: flex;
    justify-content: center;
    flex-direction: column;
}
.square p {
    opacity: 0;
    text-align: center;
    font-size: 30px;
    animation: text_ 5s linear infinite;
    color: #797979;
    margin: 0;
    letter-spacing: 5px;
    text-indent: 12px;
}
.square:after {
    content: "";
    background: rgb(118, 169, 4);
    width: 15px;
    height: 15px;
    position: absolute;
    right: -8px;
    top: 6px;
    border-radius: 50%;
    animation: round_ 5s linear infinite;
}
@keyframes snake {
    0% {
        box-shadow: 0px -82px 0 2px white, -172px 0px 0 2px white, 0px 82px 0 2px white, 172px 0px 0 2px white, 0px 0px 0 2px #797979;
        -webkit-filter: blur(1px);
        filter: blur(1px);
    }
    20% {
        box-shadow: -174px -82px 0 2px white, -172px 0px 0 2px white, 0px 52px 0 2px white, 172px 0px 0 2px white, 0px 0px 0 2px #797979;
    }
    25% {
        box-shadow: -174px -82px 0 2px white, -172px 84px 0 2px white, 0px 82px 0 2px white, 172px 0px 0 2px white, 0px 0px 0 2px #797979;
        -webkit-filter: blur(0px);
        filter: blur(0px);
    }
    30% {
        box-shadow: -174px -82px 0 2px white, -172px 84px 0 2px white, 174px 52px 0 2px white, 172px 0px 0 2px white, 0px 0px 0 2px #797979;
    }
    35% {
        box-shadow: -174px -82px 0 2px white, -172px 84px 0 2px white, 174px 852px 0 2px white, 172px -54px 0 2px white, 0px 0px 0 2px #797979;
    }
    95% {
        box-shadow: -174px -82px 0 2px white, -172px 84px 0 2px white, 174px 852px 0 2px white, 172px -54px 0 2px white, 0px 0px 0 2px #797979;
        -webkit-filter: blur(0px);
        filter: blur(0px);
    }
    100% {
        box-shadow: -174px -82px 0 2px white, -172px 84px 0 2px white, 174px 852px 0 2px white, 172px -54px 0 2px white, 0px 0px 0 2px #FFF;
        -webkit-filter: blur(5px);
        filter: blur(5 px);
    }
}
@keyframes text_ {
    0% {
        opacity: 0;
    }
    25% {
        opacity: 0;
    }
    35% {
        opacity: 0;
        -webkit-filter: blur(5px);
        filter: blur(5px);
    }
    55% {
        opacity: 1;
        -webkit-filter: blur(0px);
        filter: blur(0 px);
    }
    90% {
        opacity: 1;
        -webkit-filter: blur(0px);
        filter: blur(0px);
    }
    100% {
        opacity: .1;
        -webkit-filter: blur(5px);
        filter: blur(5 px);
    }
}
@keyframes round_ {
    0% {
        opacity: 0
    }
    55% {
        opacity: 0;
    }
    65% {
        opacity: 1;
    }
    85% {
        opacity: 1;
    }
    95% {
        opacity: .1;
    }
    100% {
        opacity: .2;
    }
}

        </style>
    </head>


     <body>
    
        <!--   START LOADER  -->
        <div id="loader-wrapper" >

           <div class="square-container">
              <div class="square">
                 <p>JCSGMS</p>
              </div>


           </div>
           <div class="loader-section section-left"></div>
           <div class="loader-section section-right"></div>

        </div>
        <!--   END LOADER  -->





  </body>
</html>
