function showInfoModal(id) {
    $.ajax({
        url: '/admin/getSubjectData/' + id,
        type: 'GET',
        success: function(subject) {
            console.log(subject);
            $.get("/templates/subject/infoSubjectModle.html", function (template) {
                var editSubject = template
                    .replace(/\${subjectName}/g, subject.name)
                    .replace(/\${subjectCode}/g, subject.subject_code)
                    .replace(/\${successMark}/g, subject.success_mark)
                    .replace(/\${fullMark}/g, subject.full_mark)
                    .replace(/\${routSubjectEdit}/g, routSubjectEdit)

                    .replace(/\${csrf_token}/g, csrf_token)
                    .replace(/\${subjectId}/g, subject.id);
                $(`.infoModle`).append(editSubject);
            });
            hideAllModals();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}


function closeModalInfoSubject(subjectId) {
    var modal = document.querySelector("#InfoSubject_" + subjectId);
    modal.classList.add('hidden');
    modal.remove();

}

function hideAllModals() {
    // يجعل كل الـ Modals مخفية
    $('[id^="InfoSubject_"]').addClass('hidden');
    $('[id^="InfoSubject_"]').remove();
}
