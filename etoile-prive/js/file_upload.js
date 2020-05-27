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
            $('.modal-ok').click(function () {
                $.ajax({
                    url: "inc\\interface\\file_upload.php",
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == 0) {
                            alert("Le fichier doit être au format .PDF");
                            $('#myModal').modal('hide');
                            $('.input-file').val('');
                        } else {
                            $('#myModal').modal('hide');
                            $('iframe').attr('src', data);
                            $('.input-file').val('');
                        }
                    },
                    error: function () {
                        $('#myModal').modal('hide');
                        alert('Téléchargement échoué');
                        $('.input-file').val('');
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