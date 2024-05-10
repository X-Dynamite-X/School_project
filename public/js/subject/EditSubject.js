
$(document).on('click', '.editSubjectButton', function() {
    var id = $(this).data("id");
    var form = $("#formEditSubject" + id);
    var formData = form.serialize();
    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            $("#errurMessageInputSubjectEdit"+ data.id).text("");
            $("#errurMessageInputCodeSubjectEdit"+ data.id).text("");
            $("#errurMessageInputSuccessMarkEdit"+ data.id).text("");
            $("#errurMessageInputFullMarkEdit"+ data.id).text("");
            $("#subjectName_" + data.id).text(data.subject);
            $("#subjectCode_" + data.id).text(data.subject_code);
            $("#subjectSuccessMark_" + data.id).text(data.success_mark);
            $("#subjectFullMark_" + data.id).text(data.full_mark);
            $("#subjectInfoSubjectName_" + data.id).text(data.subject);
            $("#subjectInfoSubjectCode_" + data.id).text(data.subject_code);
            $("#subjectInfoSuccessMark_" + data.id).text(data.success_mark);
            $("#subjectInfoFullMark_" + data.id).text(data.full_mark);
            $('[id^="EditSubject"]').addClass('hidden');

        },
        error: function (data) {
            var errur = data.responseJSON.message;
            console.log(errur);

            $("#errurMessageInputSubjectEdit"+ id).text("");
            $("#errurMessageInputCodeSubjectEdit"+ id).text("");
            $("#errurMessageInputSuccessMarkEdit"+ id).text("");
            $("#errurMessageInputFullMarkEdit"+ id).text("");

            $("#errurMessageInputSubjectEdit"+ id).text(errur.name);
            $("#errurMessageInputCodeSubjectEdit"+ id).text(errur.subject_code);
            $("#errurMessageInputSuccessMarkEdit"+ id).text(errur.success_mark);
            $("#errurMessageInputFullMarkEdit"+ id).text(errur.full_mark);
        },
    });
});
