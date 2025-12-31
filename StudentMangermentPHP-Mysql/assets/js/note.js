// Note Page JavaScript

function openNoteModal() {
    document.getElementById('noteModal').classList.add('show');
    document.querySelector('form').reset();
    document.querySelector('input[name="action"]').value = 'create';
    document.getElementById('note_id').value = '';
}

function closeNoteModal() {
    document.getElementById('noteModal').classList.remove('show');
}

function closeViewNoteModal() {
    document.getElementById('viewNoteModal').classList.remove('show');
}

function editNote(noteId) {
    // In a real app, you would fetch note data via AJAX
    openNoteModal();
    document.querySelector('input[name="action"]').value = 'update';
    document.getElementById('note_id').value = noteId;
    // Set form values with AJAX here
}

function viewNote(noteId) {
    // In a real app, you would fetch note data via AJAX
    const modal = document.getElementById('viewNoteModal');
    modal.classList.add('show');
    // Populate with AJAX data here
    document.getElementById('viewNoteContent').innerHTML = '<p>Loading note...</p>';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const noteModal = document.getElementById('noteModal');
    const viewModal = document.getElementById('viewNoteModal');
    
    if (event.target == noteModal) {
        noteModal.classList.remove('show');
    }
    if (event.target == viewModal) {
        viewModal.classList.remove('show');
    }
}
