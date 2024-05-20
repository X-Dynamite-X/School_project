$(document).ready(function() {
    $('#openCreatSubject').click(function() {
        $('#CreatSubject').removeClass('hidden');
    });

    $('#CreatSubject').on('click', function(event) {
        if (event.target === this) {
            $(this).addClass('hidden');
        }
    });
});

function closeModalCreateSubject() {
    var modal = document.querySelector('#CreatSubject');
    modal.classList.add('hidden');
}


$(document).ready(function () {
    var form = $("#formSubject");
    $("#createSubject").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                var subject = data[0];
                var users = data[1];


                $("#errurMessageInputSubject").text("");
                $("#errurMessageInputCodeSubject").text("");
                $("#errurMessageInputSuccessMark").text("");
                $("#errurMessageInputFullMark").text("");
                $("#formSubject").find("input").val("");
                $("#CreatSubject").addClass('hidden');
            },
            error: function (data) {
                var errur = data.responseJSON.message;
                console.log(errur);
                $("#errurMessageInputSubject").text("");
                $("#errurMessageInputCodeSubject").text("");
                $("#errurMessageInputSuccessMark").text("");
                $("#errurMessageInputFullMark").text("");
                $("#errurMessageInputSubject").text(errur.name);
                $("#errurMessageInputCodeSubject").text(errur.subject_code);
                $("#errurMessageInputSuccessMark").text(errur.success_mark);
                $("#errurMessageInputFullMark").text(errur.full_mark);
            },
        });
    });
});
