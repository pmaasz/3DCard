<?php
/**
 * Created by PhpStorm.
 * User: Philipnormal
 * Date: 08.11.18
 * Time: 17:14
 * License: GPL 3.0
 */
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <style>
        :root {
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
        }

        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -ms-overflow-style: scrollbar;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            margin: 0;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        *, ::after, ::before {
            box-sizing: border-box;
        }

        .container {
            width: 720px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .multidimensional-card{
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
            background-color: #f3f4f1;
            transform: rotateY(1deg) rotateX(0deg) rotateZ(0deg) scale(1);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;

            height: 500px;
        }

        .multidimensional-card-body{
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
            margin: 10% 20% 0 0;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
            background-color: white;
            transform: rotateY(1deg) rotateX(0deg) rotateZ(0deg) scale(1);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }

        .filler{
            height: 50px;
        }
    </style>
</head>
<body>

<div class="filler"></div>

<div class="container">
    <div class="multidimensional-card shadow" onmouseover="mOverCard(this)" onmouseout="mOut(this)" id="multidimensional-card" >
        <div class="multidimensional-card-body shadow" onmouseout="mOut(this)">

        </div>
    </div>
</div>

<div id="dbg"></div>




<script>
     var mousePosX;
     var mousePosY;
     var elem = document.getElementById('multidimensional-card');

     elem.addEventListener('mousemove', onMousemove, false);

     var dbg = document.getElementById('dbg');

     function onMousemove(e){
         var m_posx = 0, m_posy = 0, e_posx = 0, e_posy = 0,
             obj = this;
         //get mouse position on document crossbrowser
         if (!e){e = window.event;}
         if (e.pageX || e.pageY){
             m_posx = e.pageX;
             m_posy = e.pageY;
         } else if (e.clientX || e.clientY){
             m_posx = e.clientX + document.body.scrollLeft
                 + document.documentElement.scrollLeft;
             m_posy = e.clientY + document.body.scrollTop
                 + document.documentElement.scrollTop;
         }
         //get parent element position in document
         if (obj.offsetParent){
             do{
                 e_posx += obj.offsetLeft;
                 e_posy += obj.offsetTop;
             } while (obj = obj.offsetParent);
         }

         mousePosX = m_posx-e_posx;
         mousePosY = m_posy-e_posy;

         // mouse position minus elm position is mouseposition relative to element:
         dbg.innerHTML = ' X Position: ' + mousePosX
             + ' Y Position: ' + mousePosY;
     }

    function mOverCard(obj) {
        var rotateY = 1;
        var rotateX = 0;

        if(mousePosY < 300 && mousePosX < 320){
            for (let i = 0; i < 10; i++) {
                rotateX--;
                rotateY--;
                obj.style.transform = "rotateX(" + rotateX + "deg) rotateY(" + rotateY + "deg) rotateZ(0deg) scale(1)";
                console.log(rotateX);

            }
        }

        if(mousePosY > 300 && mousePosX > 320){
            for (let i = 0; i < 10; i++) {
                rotateX++;
                rotateY++;
                obj.style.transform = "rotateX(" + rotateX + "deg) rotateY(" + rotateY + "deg) rotateZ(0deg) scale(1)";
                console.log(rotateX);

            }
        }

        if(mousePosY < 300 && mousePosX > 320){
            for (let i = 0; i < 10; i++) {
                rotateX++;
                rotateY--;
                obj.style.transform = "rotateX(" + rotateX + "deg) rotateY(" + rotateY + "deg) rotateZ(0deg) scale(1)";
                console.log(rotateX);

            }
        }

        if(mousePosY > 300 && mousePosX < 320){
            for (let i = 0; i < 10; i++) {
                rotateX--; //(mousePosX/2 - mousePosX) /100)
                rotateY++;
                obj.style.transform = "rotateX(" + rotateX + "deg) rotateY(" + rotateY + "deg) rotateZ(0deg) scale(1)";
                console.log(rotateX);

            }
        }
    }

/*     function mOverCardBody(obj) {
        translateY =+ 0.05;
        translateX =+ 0.05;
        obj.style.transform = "TranslateX(" + translateX + "deg) TranslateY(" + translateY + "deg)";
     }*/

     function mOut(obj) {
         obj.style.transform = "rotateY(1deg)";
         obj.style.transform = "rotateX(0deg)";
         obj.style.transform = "rotateZ(0deg)";
         obj.style.transform = "scale(1)";
     }
</script>
</body>
</html>