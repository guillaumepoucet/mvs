$(function () {
    // type de document
    $('.modal-js').load("js\\file_upload_modal.php");
    var typeDoc = $('#file').attr('name');
    $('#btn-upload').click(function (e) {
        e.preventDefault();

        if ($('.input-file').val() == '') {
            alert('Vous devez sélectionnier un fichier')
        } else {
            var files = $('#file')[0].files[0];
            var fd = new FormData();
            fd.append('file', files);
            fd.append('doc', typeDoc);
            // for (var pair of fd.entries()) {
            //     console.log(pair[0] + ', ' + pair[1]);
            // }
            $('#myModal').modal('show');
            $('.file_name').text(files.name);
            $('modal-ok').click(function () {
                $.ajax({
                    url: "inc\\interface\\file_upload.php",
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('iframe').attr('src', data);
                    },
                    error: function () {
                        alert('Téléchargement échoué');
                    },
                    dataType: 'text'
                })
            })
            $('.modal-cancel').click(function () {
                $('.input-file').val('');
            })
        }
    })

});