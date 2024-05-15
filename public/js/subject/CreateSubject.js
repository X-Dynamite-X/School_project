$(document).ready(function () {
    var form = $("#formSubject");
    $("#createSubject").click(function () {
        var formData = form.serialize();
        console.log(formData);
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                var subject = data[0];
                var users = data[1];
                console.log(subject);
                console.log(users);

                $("#errurMessageInputSubject").text("");
                $("#errurMessageInputCodeSubject").text("");
                $("#errurMessageInputSuccessMark").text("");
                $("#errurMessageInputFullMark").text("");
                $("#formSubject").find("input").val("");
                $.get("/templates/trSubjectRow.html", function (template) {
                    var row = template
                        .replace(/\${subjectId}/g, subject.id)
                        .replace(/\${subjectName}/g, subject.name)
                        .replace(/\${subjectCode}/g, subject.subject_code)
                        .replace(/\${successMark}/g, subject.success_mark)
                        .replace(/\${fullMark}/g, subject.full_mark);
                    $(`#tbodySubject`).append(row);
                });
                $.get("/templates/infoSubjectModle.html", function (template) {
                    var infoSubject = template.replace(
                        /\${subjectId}/g,
                        subject.id
                    );
                    $(`.infoModle`).append(infoSubject);
                });
                $.get("/templates/editSubjectModle.html", function (template) {
                    var editSubject = template
                        .replace(/\${subjectName}/g, subject.name)
                        .replace(/\${subjectCode}/g, subject.subject_code)
                        .replace(/\${successMark}/g, subject.success_mark)
                        .replace(/\${fullMark}/g, subject.full_mark)
                        .replace(/\${csrf_token}/g, csrf_token)
                        .replace(/\${subjectId}/g, subject.id);
                    $(`.editModle`).append(editSubject);
                });
                $.get("/templates/deleteSubjectModle.html", function (template) {
                    var editSubject = template
                        .replace(/\${subjectName}/g, subject.name)
                        .replace(/\${routSubjectDelete}/g, routSubjectDelete)
                        .replace(/\${csrf_token}/g, csrf_token)
                        .replace(/\${subjectId}/g, subject.id);
                    $(`.editModle`).append(editSubject);
                });

                $.get("/templates/createSubjectUserModle.html",
                    function (template) {
                        var createSubjectUser = template
                            .replace(/\${subjectName}/g, subject.name)
                            .replace(
                                /\${routCreateSubjectUser}/g,
                                routCreateSubjectUser
                            )
                            .replace(/\${csrf_token}/g, csrf_token)
                            .replace(/\${subjectId}/g, subject.id);
                        $(".createSubjectUserModle").append(createSubjectUser);
                        $(".deleteModleSubjectUser").append(createSubjectUser);
                        $(".deleteModleSubjectUser").append(createSubjectUser);
                        var selectElement = document.getElementById(
                            `userNameSubjectUsers_${subject.id}`
                        );
                        var editSubjectUserModle_ = `<div class=editSubjectUserModle_${subject.id}></div>`;
                        var deleteSubjectUserModle = `<div class=deleteSubjectUserModle_${subject.id}></div>`;
                        $(".editModleSubjectUser").append(
                            editSubjectUserModle_
                        );
                        $(".deleteModleSubjectUser").append(
                            deleteSubjectUserModle
                        );
                        users.forEach(function (user) {
                            var option = document.createElement("option");
                            option.setAttribute(
                                "id",
                                `optionUserNameInSubjectUser_${subject.id}_${user.id}`
                            );
                            option.setAttribute(
                                "class",
                                "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            );
                            option.setAttribute("value", user.id);
                            option.textContent = user.name;
                            selectElement.appendChild(option);
                        });
                    }
                );

                $('[id^="EditSubject"]').addClass("hidden");
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
