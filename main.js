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
    $('li.poll_li_1').css('display', 'list-item');
});

$('.question_poll_item').on('click', '.del-poll-li', () => {
    $('li.poll_li_1').css('display', 'none');
    $('.show-files-detail').css('display', 'none');
    $('#files-detail').text("");
    $('.file').val(''); 
    var fi = document.getElementsByClassName('file')[0];
    $('.fakefile button').text("Total files: "+fi.files.length);
});
$('textarea.comment-input').keypress(function(e){
    var char = e.keyCode ||e.which ;
    if(char == 13){
        $(this).attr('rows', $(this).rows + 1);
        console.log($(this).rows);
    }
})

function FileDetails() {
    var fi = document.getElementsByClassName('file')[0];
    if (fi.files.length > 0) {
        $('#files-detail').text(function(){
            var str = '';
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fname = fi.files.item(i).name;      // THE NAME OF THE FILE.
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                str += fname + ", ";
            }
            return str;
        });
        
    }
    else { 
        alert('Please select a file.') 
    }
    
};
$('body').on('change', 'input[type=file]', function(){
    var fi = document.getElementsByClassName('file')[0];
    $('.fakefile button').text("Total files: "+fi.files.length);
    $('.show-files-detail').css('display', 'block');
});
$("#selectAllAss").click(function(){
    $(".assignment-visibility input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
$("#selectAllMat").click(function(){
    $(".material-visibility input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
$("#selectAllAnn").click(function(){
    $(".announ-visibility input[type=checkbox]").prop('checked', $(this).prop('checked'));

});
$('button').on('click', function() { 
    var array = []; 
    $("input:checkbox[name=type]:checked").each(function() { 
        array.push($(this).val()); 
    }); 
    $('#GFG_DOWN').text(array); 
}); 
$('.add_category_btn').on('click', function(){
    if($('#add-new-category').val() != ""){
        $option = $("<option></option>");
        $option.val($('#add-new-category').val());
        $option.text($option.val()); 
        $('#category').append($option);
    }

});