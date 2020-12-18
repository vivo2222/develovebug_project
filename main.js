// $('.infocenter_mobile_click').on('click', function () {
//     $('.navigation_mobile ul').toggle();
// });
var Calendar = function(t) {
    this.divId = t.RenderID ? t.RenderID : '[data-render="calendar"]', this.DaysOfWeek = t.DaysOfWeek ? t.DaysOfWeek : ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], this.Months = t.Months ? t.Months : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var e = new Date;
    this.CurrentMonth = e.getMonth(), this.CurrentYear = e.getFullYear();
    var r = t.Format;
    this.f = "string" == typeof r ? r.charAt(0).toUpperCase() : "M"
};
Calendar.prototype.nextMonth = function() {
    11 == this.CurrentMonth ? (this.CurrentMonth = 0, this.CurrentYear = this.CurrentYear + 1) : this.CurrentMonth = this.CurrentMonth + 1, this.divId = '[data-active="false"] .render', this.showCurrent()
}, Calendar.prototype.prevMonth = function() {
    0 == this.CurrentMonth ? (this.CurrentMonth = 11, this.CurrentYear = this.CurrentYear - 1) : this.CurrentMonth = this.CurrentMonth - 1, this.divId = '[data-active="false"] .render', this.showCurrent()
}, Calendar.prototype.previousYear = function() {
    this.CurrentYear = this.CurrentYear - 1, this.showCurrent()
}, Calendar.prototype.nextYear = function() {
    this.CurrentYear = this.CurrentYear + 1, this.showCurrent()
}, Calendar.prototype.showCurrent = function() {
    this.Calendar(this.CurrentYear, this.CurrentMonth)
}, Calendar.prototype.checkActive = function() {
    1 == document.querySelector(".months").getAttribute("class").includes("active") ? document.querySelector(".months").setAttribute("class", "months") : document.querySelector(".months").setAttribute("class", "months active"), "true" == document.querySelector(".month-a").getAttribute("data-active") ? (document.querySelector(".month-a").setAttribute("data-active", !1), document.querySelector(".month-b").setAttribute("data-active", !0)) : (document.querySelector(".month-a").setAttribute("data-active", !0), document.querySelector(".month-b").setAttribute("data-active", !1)), setTimeout(function() {
        document.querySelector(".calendar .header").setAttribute("class", "header active")
    }, 200), document.querySelector("body").setAttribute("data-theme", this.Months[document.querySelector('[data-active="true"] .render').getAttribute("data-month")].toLowerCase())
}, Calendar.prototype.Calendar = function(t, e) {
    "number" == typeof t && (this.CurrentYear = t), "number" == typeof t && (this.CurrentMonth = e);
    var r = (new Date).getDate(),
        n = (new Date).getMonth(),
        a = (new Date).getFullYear(),
        o = new Date(t, e, 1).getDay(),
        i = new Date(t, e + 1, 0).getDate(),
        u = 0 == e ? new Date(t - 1, 11, 0).getDate() : new Date(t, e, 0).getDate(),
        s = "<span>" + this.Months[e] + " &nbsp; " + t + "</span>",
        d = '<div class="cal-table">';
    d += '<div class="row head">';
    for (var c = 0; c < 7; c++) d += '<div class="cell">' + this.DaysOfWeek[c] + "</div>";
    d += "</div>";
    for (var h, l = dm = "M" == this.f ? 1 : 0 == o ? -5 : 2, v = (c = 0, 0); v < 6; v++) {
        d += '<div class="row">';
        for (var m = 0; m < 7; m++) {
            if ((h = c + dm - o) < 1) d += '<div class="cell disable">' + (u - o + l++) + "</div>";
            else if (h > i) d += '<div class="cell disable">' + l++ + "</div>";
            else {
                d += '<div class="cell' + (r == h && this.CurrentMonth == n && this.CurrentYear == a ? " active" : "") + '"><span>' + h + "</span></div>", l = 1
            }
            c % 7 == 6 && h >= i && (v = 10), c++
        }
        d += "</div>"
    }
    d += "</div>", document.querySelector('[data-render="month-year"]').innerHTML = s, document.querySelector(this.divId).innerHTML = d, document.querySelector(this.divId).setAttribute("data-date", this.Months[e] + " - " + t), document.querySelector(this.divId).setAttribute("data-month", e)
}, window.onload = function() {
    var t = new Calendar({
        RenderID: ".render-a",
        Format: "M"
    });
    t.showCurrent(), t.checkActive();
    var e = document.querySelectorAll(".header [data-action]");
    for (i = 0; i < e.length; i++) e[i].onclick = function() {
        if (document.querySelector(".calendar .header").setAttribute("class", "header"), "true" == document.querySelector(".months").getAttribute("data-loading")) return document.querySelector(".calendar .header").setAttribute("class", "header active"), !1;
        var e;
        document.querySelector(".months").setAttribute("data-loading", "true"), this.getAttribute("data-action").includes("prev") ? (t.prevMonth(), e = "left") : (t.nextMonth(), e = "right"), t.checkActive(), document.querySelector(".months").setAttribute("data-flow", e), document.querySelector('.month[data-active="true"]').addEventListener("webkitTransitionEnd", function() {
            document.querySelector(".months").removeAttribute("data-loading")
        }), document.querySelector('.month[data-active="true"]').addEventListener("transitionend", function() {
            document.querySelector(".months").removeAttribute("data-loading")
        })
    }
};
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