$('.infocenter_mobile_click').on('click', function () {
    $('.navigation_mobile ul').toggle();
});
const joinText = document.querySelector(".title-text .join");
const joinForm = document.querySelector("form.join");
const joinBtn = document.querySelector("label.join");
const createBtn = document.querySelector("label.create");
const createLink = document.querySelector("form .create-link a");
createBtn.onclick = (()=>{
    joinForm.style.marginLeft = "-50%";
    joinText.style.marginLeft = "-50%";
});
joinBtn.onclick = (()=>{
    joinForm.style.marginLeft = "0%";
    joinText.style.marginLeft = "0%";
});

$('.tooltip-btn').on('click',function(){
    $('.hidden').toggle();
});
$('.close-icon').on('click',function(){
    $('.hidden').toggle();
});
$('.class-alter-icon').on('click', function(){
    $('.class-alter-icon ul').toggle();
});
$('.post-alter-icon').on('click', function(){
    $('.post-alter-icon ul').toggle();
})