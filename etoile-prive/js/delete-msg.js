$(function () {
    $('.delete-msg').click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            method: "get",
            url: "inc\\interface\\delete_mess.php",
            data: { "id": id },
            dataType: 'text',
            success: function () {
                $('#msg-' + id).remove();
                window.scrollTo($('#msg-container'));
                $('#alert-del-msg').removeClass("d-none");
            }
        })
    })
});