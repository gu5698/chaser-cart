// load header & footer
$(function () {
    $("#header").load("common.html");
    // $("#footer").load("footer.html");
});

// 表單特效
$(function () {
    ////输入框获得焦点时
    $("input").focus(function (event) {
        //label动态上升，升至顶部
        $(this).siblings("label").stop().animate({
            "top": "-1.5rem"
        }, 500);
        //div模拟的下边框伸出，其width动态改变至input的width
        $(this).next(".bottom-line").stop().animate({
            "width": "101%"
        }, 500);
    });
    ////输入框失去焦点时
    $("input").blur(function (event) {
        //input內無字
        if ($(this).val() == "") {
            //label动态下降，恢复原位
            $(this).siblings("label").stop().animate({
                "top": "-0.5rem"
            }, 500);
            //用div模拟的下边框缩回，其width动态恢复为默认宽度0
            $(this).next(".bottom-line").stop().animate({
                "width": "0"
            }, 500);
        };
    });
});

// hamburger
$(document).ready(function () {
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });
});

// 燈箱開關
function showLoginForm() {
    document.getElementById("lightBox").style.display = '';
}

function cancelLogin() {
    document.getElementById("lightBox").style.display = 'none';
}

function init() {
    document.getElementsByClassName("pin").onclick = showLoginForm;
    // document.getElementById('close').onclick = cancelLogin;
};

window.onload = init;

// 燈箱表單驗證
function check_select() {
    // console.log("form", form, "time",  time );

    if (time.value == "---") {
        alert("請幫我們選個時間唷！");
        return false;
    } else {
        return true;
    }
}

//cart1
//增加list項目
$(document).ready(function () {
    // $("button").click(function () {
    //     $(".product:last").after(function () {
    //         return
    //     });
    // });
    $(".fa-plus").click(function () {
        var num = $("input").val() + 1;
        $("input").val(num);
    });
});