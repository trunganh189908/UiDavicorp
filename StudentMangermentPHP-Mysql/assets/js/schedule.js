// Schedule Page JavaScript

function openScheduleModal() {
    document.getElementById('scheduleModal').classList.add('show');
    document.querySelector('form').reset();
    document.querySelector('input[name="action"]').value = 'create';
    document.getElementById('schedule_id').value = '';
}

function closeScheduleModal() {
    document.getElementById('scheduleModal').classList.remove('show');
}

function editSchedule(scheduleId) {
    // In a real app, you would fetch schedule data via AJAX
    openScheduleModal();
    document.querySelector('input[name="action"]').value = 'update';
    document.getElementById('schedule_id').value = scheduleId;
    // Set form values with AJAX here
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('scheduleModal');
    if (event.target == modal) {
        modal.classList.remove('show');
    }
}
