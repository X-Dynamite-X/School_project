<script>

    function showInfoModal(subjectId) {
                hideAllModals();
                $('#InfoSubject' + subjectId).removeClass('hidden');
            }

    function closeModalInfoSubject(subjectId) {
    var modal = document.querySelector("#InfoSubject" + subjectId);
    modal.classList.add('hidden');
}
function hideAllModals() {
                // يجعل كل الـ Modals مخفية
                $('[id^="InfoSubject"]').addClass('hidden');
            }
</script>

