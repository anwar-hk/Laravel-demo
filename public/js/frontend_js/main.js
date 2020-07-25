/*price range*/

$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

/*scroll to top*/
$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: "scrollUp",
            scrollDistance: 300,
            scrollFrom: "top",
            scrollSpeed: 300,
            easingType: "linear",
            animation: "fade",
            animationSpeed: 200,
            scrollTrigger: false,
            scrollText: '<i class="fa fa-angle-up"></i>',
            scrollTitle: false,
            scrollImg: false,
            activeOverlay: false,
            zIndex: 2147483647,
        });
    });
});

//this code generates prize with different sizes through ajax
$(document).ready(function () {
    $("#selSize").change(function () {
        var idSize = $(this).val();
        if (idSize == "") {
            return false;
        }
        $.ajax({
            type: "get",
            url: "/get-product-price",
            data: { idSize: idSize },
            success: function (resp) {
                var arr = resp.split("#");
                $("#getPrice").html("Rs " + arr[0]);
                $("#price").val(arr[0]);
                if (arr[1] == 0) {
                    $("#cartButton").hide();
                    $("#Availability").text("Out of Stock");
                } else {
                    $("#cartButton").show();
                    $("#Availability").text("In Stock");
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});

$(document).ready(function () {
    $(".changeImage").click(function () {
        var image = $(this).attr("src");
        $(".mainImage").attr("src", image);
    });
});

//zoom functionality
$(document).ready(function () {
    var $easyzoom = $(".easyzoom").easyZoom();
    var api1 = $easyzoom.filter(".easyzoom--with-thumbnails").data("easyZoom");
    $(".thumbnails").on("click", "a", function (e) {
        var $this = $(this);
        e.preventDefault();
        api1.swap($this.data("standard"), $this.attr("href"));
    });
    var api2 = $easyzoom.filter(".easyzoom--with-toggle").data("easyZoom");
    $(".toggle").on("click", function () {
        var $this = $(this);
        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
});

//Validarion for register form
$().ready(function () {
    $("#registerForm").validate({
        rules: {
            name: {
                required: true,
                minLength: 4,
                accept: "[a-zA-Z]+",
            },
            email: {
                required: true,
                email: true,
                remote: "/check-email",
            },
            password: {
                required: true,
                minLength: 6,
            },
        },
        messages: {
            name: {
                required: "Please Enter Your Name!",
                minLength: "Your name must contain 4 letters",
                accept: "Your name must contain letters only",
            },
            email: {
                required: "Please enter your email",
                email: "Please enter valid email",
                remote: "Email already exists!",
            },
            password: {
                required: "Please provide your Password",
                minLength: "Your Password must have 6 chracters long",
            },
        },
    });

    //Validarion for login form
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter valid email",
            },
            password: {
                required: "Please provide your Password",
            },
        },
    });
    $("#accountForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            name: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter valid email",
            },
            name: {
                required: "Please provide your Name",
            },
            address: {
                required: "Please provide your Address",
            },
            city: {
                required: "Please provide your City",
            },
            state: {
                required: "Please provide your State",
            },
        },
    });
    //Check Current pwd matched or not!!!
    $("#current_pwd").keyup(function () {
        var current_pwd = $(this).val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/check-user-pwd",
            data: { current_pwd: current_pwd },
            success: function (resp) {
                //alert(resp);
                if (resp == "true") {
                    $("#chkPwd").html(
                        "<font color='green'>Current Password is correct</font>"
                    );
                } else {
                    $("#chkPwd").html(
                        "<font color='red'>Current Password is inCorrect</font>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
    //Password Strenghten JQuery
    $("#myPassword").passtrength({
        minChars: 4,
        passwordToggle: true,
        tooltip: true,
        eyeImg: "/images/frontend_img/eye.svg",
    });
});
