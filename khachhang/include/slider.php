<!-- -----------------------SLlDER---------------------------------------------- -->
<section class="sliders">
      <div class="aspect-ratio-169">
          <img src="image/slide1.jpg" alt="không thể hiển thị">
          <img src="image/slider2.jpg" alt="không thể hiển thị">
          <img src="image/slide3.jpg" alt="không thể hiển thị">
      </div>
      <div class="dot-container">
          <div class="dot active"></div>
          <div class="dot"></div>
          <div class="dot"></div>
     </div>
  </section>
 <script>
     const imgItem = document.querySelectorAll(".aspect-ratio-169 img")
 const imgItemContainer = document.querySelector(".aspect-ratio-169")
 const dotItem = document.querySelectorAll(".dot")
 let index = 0;
 let imgLeng = imgItem.length
 imgItem.forEach(function(image,index){
     image.style.left = index*100 + "%"
     dotItem[index].addEventListener("click",function(){
     slideRun (index)
     })
 })
 function slider (){
     index++;
     if(index >= imgLeng){index=0}
   
     slideRun (index)
 }
 function slideRun (index) {
     imgItemContainer.style.left = "-" + index*100 + "%"
     const dotActive = document.querySelector(".active")
     dotActive.classList.remove("active")
     dotItem[index].classList.add("active");
 }
 
 setInterval (slider,5000)




const toP = document.querySelector(".top")
window.addEventListener("scroll",function(){
    const X = this.pageYOffset;
  if(X>1){toP.classList.add("active")}
  else {
      toP.classList.remove("active")
  }
}) 
                        
</script>