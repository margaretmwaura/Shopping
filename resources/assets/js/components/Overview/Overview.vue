<template>
<div>
  <div class="grid-x ml-12 mr-12 mt-10">
        <div class="cell small-12 medium-5 large-5">
        </div>
        <div class="cell small-12 medium-1 large-1 ">
          <img :src="`./../../../images/another.svg`" class="left"> 
        </div>
        <div class="cell small-12 medium-1 large-1">
           <img :src="`./../../../images/gear.svg`" class="right">
        </div>
        <div class="cell small-12 medium-5 large-5">  
        </div>   
   </div>
   <div class="container text-center">
       <p class="font-extrabold text-4xl">
              We
              <br>
               <span>Getting Ready to </span>
               <br>
               Launch soon 
       </p>
   </div>
   <div class="container text-center pt-4">
       <p class="font-normal text-lg">
              This is the section of the page where visitors will get 
              <br>
              a position to see what we are offering at the shop and make their 
              <br>
              orders. So many other cool functionalities will be present.
       </p>
   </div>
    <div class="container grid-x">
        <div class="cell small-12 medium-12 large-12 ">
            <img :src="`./../../../images/progress.jpeg`" class="center">
        </div> 
   </div>
</div>
</template>

<script>
    export default {
        name: "Overview"
    }
</script>

<style scoped>
.right {
    width: 120px;
    height: 120px;
    -webkit-animation:spin 40s linear infinite;
    -moz-animation:spin 40s linear infinite;
    animation:spin 40s linear infinite;
}
@-moz-keyframes spin { 50% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 50% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 50% { -webkit-transform: rotate(360deg); transform:rotate(360deg); }
 }

 .left {
    width: 120px;
    height: 120px;
    -webkit-animation:spin 40s linear infinite;
    -moz-animation:spin 40s linear infinite;
    animation:spin 40s linear infinite;
}
@-moz-keyframes spin { 50% { -moz-transform: rotate(-360deg); } }
@-webkit-keyframes spin { 50% { -webkit-transform: rotate(-360deg); } }
@keyframes spin { 50% { -webkit-transform: rotate(-360deg); transform:rotate(-360deg); }
 }

 span{
      background: -webkit-linear-gradient(#283BA0, #A7E4D0);
      -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
 }

 .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
