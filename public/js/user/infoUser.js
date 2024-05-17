function showInfoModal(subjectId) {
    hideAllModals(); // يخفي جميع الـ Modals أولا
    $('#infoUser_' + subjectId).removeClass('hidden');
}

function closeModalInfoUser(subjectId) {
    var modal = document.querySelector("#infoUser_" + subjectId);
    modal.classList.add('hidden');
}

function hideAllModals() {
    // يجعل كل الـ Modals مخفية
    $('[id^="infoUser_"]').addClass('hidden');
}
