

<script>
    function showEditSubjectUserModal(subjectUserId) {
        hideAllModals(); // يخفي جميع الـ Modals أولا
        $('#EditSubjectUser_' + subjectUserId).removeClass('hidden');
    }

    function closeModalEditSubjectUser(subjectUserId) {
        $('#EditSubjectUser_' + subjectUserId).addClass('hidden');
    }

    function hideAllModals() {
        $('[id^="EditSubjectUser_"]').addClass('hidden');
    }
</script>
