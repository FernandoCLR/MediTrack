@extends('layouts.app')  

 <style>
     .my{
         height: 100%;
     }
 </style>

@section('content')
<div class="my">
<img class="mySlides" src="\img\wecome slide.jpg" >
<img class="mySlides" src="\img\slide 2.jpg">
<img class="mySlides" src="\img\slide 3.jpg">
<img class="mySlides" src="\img\slide 4.jpg">
</div>
<script>
        var slideIndex = 0;
        carousel();
        
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none"; 
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1} 
            x[slideIndex-1].style.display = "block"; 
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
        </script>
@endsection
