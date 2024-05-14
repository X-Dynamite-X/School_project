$(document).on("click", ".createSubjectUser", function () {
    var subjectId = $(this).data("id");
    var subject_name = $(this).data("subject_name");

    var form = $("#formSubjectUser_" + subjectId);
    var formData = form.serialize();

    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            $("#errurMessageInputSubjectsNameInSubjectUser_" + subjectId).text(
                ""
            );
            $("#errurMessageInputUserNameInSubjectUser_" + subjectId).text("");
            $("#errurMessageInputUserNameInSubjectUsers_" + subjectId).text("");
            console.log(data.users);
            users = data.users;
            for (let index = 0; index < users.length; index++) {
                $("#optionUserNameInSubjectUser_" +subjectId +"_" +users[index].id).remove();
                $.get("/templates/trSubjectUserRow.html", function(template) {
                    var row = template
                    .replace(/\${subjectId}/g, subjectId)
                    .replace(/\${userId}/g, users[index].id)
                    .replace(/\${subject_name}/g, subject_name)
                    .replace(/\${userName}/g, users[index].name);
                    $(`#tbodySubjectUser${subjectId}`).append(row);
                });
                $.get("/templates/deleteSubjectUserModle.html", function(template) {
                    var deleteModleSubjectUser = template
                    .replace(/\${subjectId}/g, subjectId)
                    .replace(/\${userId}/g, users[index].id)
                    .replace(/\${subject_name}/g, subject_name)
                    .replace(/\${csrf_token}/g, csrf_token)
                    .replace(/\${userName}/g, users[index].name)
                    .replace(/\${routSubjectUserDelete}/g,routSubjectUserDelete);
                    $(`.deleteSubjectUserModle_${subjectId}`).append(deleteModleSubjectUser);
                });
                console.log(users[index]);
                $.get("/templates/editSubjectUserModle.html", function(template) {
                    var editModleSubjectUser = template
                    .replace(/\${subjectId}/g, subjectId)
                    .replace(/\${userId}/g, users[index].id)
                    .replace(/\${subject_name}/g, subject_name)
                    .replace(/\${csrf_token}/g, csrf_token)
                    .replace(/\${userName}/g, users[index].name)

                    .replace(/\${routSubjectUserEdit}/g,routSubjectUserEdit);
                    $(`.editSubjectUserModle_${subjectId}`).append(editModleSubjectUser);
                });
            }

            $('[id^="CreateSubjectUser"]').addClass("hidden");
        },
        error: function (xhr, textStatus, errorThrown) {
            var errur = xhr.responseJSON.message;
            console.log(errur);
            $("#errurMessageInputSubjectsNameInSubjectUser_" + subjectId).text(
                ""
            );
            $("#errurMessageInputUserNameInSubjectUser_" + subjectId).text("");
            $("#errurMessageInputUserNameInSubjectUsers_" + subjectId).text("");

            $("#errurMessageInputSubjectsNameInSubjectUser_" + subjectId).text(
                errur.subjectId
            );
            $("#errurMessageInputUserNameInSubjectUser_" + subjectId).text(
                errur.user_ids
            );

            var response = xhr.responseJSON;
            if (
                response &&
                response.message &&
                response.message.user_ids &&
                response.message.user_ids[0]
            ) {
                var errorMessage = response.message.user_ids[0][0];
                $("#errurMessageInputUserNameInSubjectUsers_" + subjectId).text(
                    errorMessage
                );
            } else {
                $("#errurMessageInputUserNameInSubjectUsers_" + subjectId).text(
                    "this student is already exist!"
                );
            }
        },
    });
});
