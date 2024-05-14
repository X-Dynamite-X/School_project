<script>
    function showDeleteSubjectUserModal(subjectUserId) {
        hideAllModals(); // يخفي جميع الـ Modals أولا
        $('#DeleteSubjectUser_' + subjectUserId).removeClass('hidden');
    }

    function closeModalDeleteSubjectUser(subjectUserId) {
        $('#DeleteSubjectUser_' + subjectUserId).addClass('hidden');
    }

    function hideAllModals() {
        $('[id^="DeleteSubjectUser_"]').addClass('hidden');
    }
</script>
