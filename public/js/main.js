$(".center").slick({
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 900,
            settings: {
                arrows: false,
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 600,
            settings: {
                arrows: false,
                slidesToShow: 1,
            },
        },
    ],
});
$(".center2").slick({
    dots: false,
    arrows: true,
    prevArrow: ".back",
    nextArrow: ".next",
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 900,
            settings: {
                arrows: false,
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 600,
            settings: {
                arrows: false,
                slidesToShow: 1,
            },
        },
    ],
});

$(document).ready(function () {
    $(".toggler").click(function () {
        $(".panel-left").show();
    });
    $(".close-side").click(function () {
        $(".panel-left").hide();
    });
});
$(document).ready(function () {
    $("#hideBtn").click(function () {
        $("#myElement").hide();
    });
    $("#showBtn").click(function () {
        $("#myElement").show();
    });

    $(".login-model").hide();
    $(".reg-model").hide();
    $(".email-model").hide();
    $(".login-btn").click(function () {
        $(".login-model").show();
        $("body").addClass("active");
        $(".reg-model").hide();
        $(".email-model").hide();
    });
    $(".close-login").click(function () {
        $(".login-model").hide();
        $("body").removeClass("active");
    });
    $(".reg-open").click(function () {
        $(".reg-model").show();
        $("body").addClass("active");
        $(".login-model").hide();
        $(".email-model").hide();
    });
    $(".close-reg").click(function () {
        $(".reg-model").hide();
        $("body").removeClass("active");
    });
    $(".email-open").click(function () {
        $(".email-model").show();
        $("body").addClass("active");
        $(".login-model").hide();
        $(".reg-model").hide();
    });
    $(".close-email").click(function () {
        $(".email-model").hide();
        $("body").removeClass("active");
    });
});

$(document).ready(function () {
    $(".tab-content").hide();
    $("#tab1").show();
    $(".tab1").addClass("active");
    $(".tab").on("click", function () {
        var tabName = $(this).data("tab");
        console.log(tabName);
        $(".tab-content").hide();
        $(".tab").removeClass("active");

        $("#" + tabName).show();
        $(this).addClass("active");
    });
});
$(document).ready(function () {
    $("#addInput").click(function () {
        var newInput = $(
            '<input type="file" class="d-none" name="images[]" id="imageInput" required>'
        );
        var newPreview = $(
            '<img src="" alt="Image Preview" class="img-preview d-none me-2">'
        );
        $(".img-m").append(newInput);
        $(".img-m").append(newPreview);
        newInput.change(function () {
            var fileInput = $(this);
            var file = fileInput[0].files[0];
            var preview = fileInput.next(".img-preview");

            if (file) {
                fileInput.addClass("d-none");
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr("src", e.target.result);
                    preview.removeClass("d-none");
                };
                reader.readAsDataURL(file);
            }
        });
        newInput.click();
    });
});

$(document).ready(function () {
    $(".tab-contentcal").hide();
    $("#tabcal1").show();
    $(".tab1cal").addClass("active");
    $(".tabcal").on("click", function () {
        var tabName = $(this).data("tab");
        console.log(tabName);
        $(".tab-contentcal").hide();
        $(".tabcal").removeClass("active");

        $("#" + tabName).show();
        $(this).addClass("active");
    });

    document
        .getElementById("photo")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff");
        });

    document
        .getElementById("photo1")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff1");
        });

    document
        .getElementById("photo2")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff2");
        });

    document
        .getElementById("photo3")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff3");
        });

    document
        .getElementById("photo4")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff4");
        });

    document
        .getElementById("photo5")
        .addEventListener("change", function (event) {
            handleFileSelect(event, "user_photo_staff5");
        });
    function handleFileSelect(event, userPhotoId) {
        const input = event.target;
        const userPhoto = document.getElementById(userPhotoId);
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                userPhoto.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
});

function previewImages(event) {
    const input = event.target;
    const previewContainer = document.getElementById("preview-container");

    for (let i = 0; i < input.files.length; i++) {
        const file = input.files[i];
        const image = document.createElement("img");
        image.id = "image-preview";
        image.src = URL.createObjectURL(file);
        previewContainer.appendChild(image);
        const saveInput = document.createElement("input");
        saveInput.type = "file";
        saveInput.name = "images[]";
        saveInput.value = file.name;
        previewContainer.appendChild(saveInput);
    }
}

// img name according to input-----
function updateImageSrc(inputElement, imageId) {
    const image = document.getElementById(imageId);
    const file = inputElement.files[0];
    if (file) {
        const URL = window.URL || window.webkitURL;
        image.src = URL.createObjectURL(file);
    }
}

function showImagePreview(input) {
    const preview = document.getElementById("image-preview");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
        preview.style.display = "none";
    }
}

function updateImagePreview(input) {
    const preview = document.getElementById("image-preview-single");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
