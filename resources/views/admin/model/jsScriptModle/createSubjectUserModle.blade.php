<script>
    function showCreateSubjectUserModal(subjectId) {
        hideAllModals(); // يخفي جميع الـ Modals أولا
        $('#CreateSubjectUser' + subjectId).removeClass('hidden');
    }

    function closeModalCreateSubjectUser(subjectId) {
        var modal = document.querySelector("#CreateSubjectUser" + subjectId);
        modal.classList.add('hidden');
    }

    function hideAllModals() {
        // يجعل كل الـ Modals مخفية
        $('[id^="CreateSubjectUser"]').addClass('hidden');
    }
</script>

