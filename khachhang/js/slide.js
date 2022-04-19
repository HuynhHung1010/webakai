
/*
var slideIndex = 0;
showSlides();

// Next/previous controls
function plusSlides(n) {
  showSlides2(slideIndex += n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  
  slides[slideIndex-1].style.display = "block";
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000);
}*/

/*-------------slide-------------------*/
/*
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
*/

//------------------------------------Menu-SLIDEBAR-CARTEGORY-------------------
const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
itemsliderbar.forEach(function(menu,index){
   menu.addEventListener("click",function(){
    menu.classList.toggle("block")
   })
})
//--------------------------------------PRODUCT----------------------
const bigImg = document.querySelector(".product-content-left-big-img img")
const smalImg =  document.querySelectorAll(".product-content-left-small-img img")
smalImg.forEach(function(imgItem,X){
  imgItem.addEventListener("click",function(){
    bigImg.src = imgItem.src
  })
})


const baoquan = document.querySelector(".baoquan")
const chitiet = document.querySelector(".chitiet")
if(baoquan){
  baoquan.addEventListener("click", function(){
    document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
    document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
  })
}
if(chitiet){
  chitiet.addEventListener("click", function(){
    document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
    document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
  })
}
const butTon = document.querySelector(".product-content-right-bottom-top")
if(butTon){
  butTon.addEventListener("click", function(){
    document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
  })
}
