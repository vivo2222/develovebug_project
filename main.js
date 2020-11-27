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
});
$('.add_upload_button_js').on('click',function(){
    $('.question_poll_item').append("<li class='poll_li_1' style='display:list-item;'><div class='poll-li'><div class='fileinputs'> <input type='file' class='file' name='files[]'><div class='fakefile'> <button type='button' class='button small margin_0'>Select file</button><span> <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z' /> <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z' /></svg>Browse</span></div><div class='del-poll-li'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-x-square-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'> <path fill-rule='evenodd' d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z' /></svg> </div> </div> </div></li>");
});

$('.question_poll_item').on('click', '.del-poll-li', (e) => {
    $(e.target).parents('li').remove();
});
$('textarea').keypress(function(e){
    var char = e.keyCode ||e.which ;
    if(char == 13){
        $(this).attr('rows', $(this).rows + 1);
        console.log($(this).rows);
    }
})