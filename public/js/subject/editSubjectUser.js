
$(document).on('click', '.editSubjectUserButton', function() {
    var subjectId = $(this).data("subject_id");
    var subjectUserId = $(this).data("user_id");
    var form = $("#formEditSubjectUser_" + subjectId+"_"+subjectUserId);
    var formData = form.serialize();
    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            $("#errurMessageInputSubjectUserMarkEdit_"+ subjectId+"_"+subjectUserId).text("");
            console.log(data);
            var mark =data.subjectUser.mark
            $("#subjecUserMark_" + subjectId+"_"+subjectUserId ).text(mark)
            $('[id^="EditSubjectUser_"]').addClass('hidden');




        },
        error: function (data) {
            var errur = data.responseJSON.message;
            console.log(errur);
            $("#errurMessageInputSubjectUserMarkEdit_"+ subjectId+"_"+subjectUserId).text("");
            $("#errurMessageInputSubjectUserMarkEdit_"+ subjectId+"_"+subjectUserId).text(errur.mark);
        },
    });
});
