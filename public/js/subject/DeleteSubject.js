$(document).on('click', '.buttonDeleteSubject', function() {

    var id = $(this).data("id");
    var form = $("#formDeleteSubject" + id);
    // if (confirm("Are you sure to delete this subject "+subject+" ?")) {
        $.ajax({
            type: "Delete",
            url: form.attr("action"),
            data: {
                _token: form.find('input[name="_token"]').val(),
                _method: "DELETE",
                id: id,
            },
            success: function (data) {
                console.log("Success:", data);
                $("#trSubject_" + id).remove();
                $('openCreatSubject').addClass('hidden');

            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    // }
    });
