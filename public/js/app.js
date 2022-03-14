$(".change-img-btn").click(function () {
    $('.change-image').slideUp(600);
    $('.hidden-upload').slideDown(600);
});


$(".btn-delete").click(function () {
    $('#delete-modal').modal({
        show: true
    });
});

$("#submit-delete").click(function () {
    $('form#delete_ad').submit();
});
