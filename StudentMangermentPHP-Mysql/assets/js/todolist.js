// Todo List Page JavaScript

function openTodoModal() {
    document.getElementById('todoModal').classList.add('show');
    document.querySelector('form').reset();
    document.querySelector('input[name="action"]').value = 'create';
    document.getElementById('todo_id').value = '';
}

function closeTodoModal() {
    document.getElementById('todoModal').classList.remove('show');
}

function editTodo(todoId) {
    // In a real app, you would fetch todo data via AJAX
    openTodoModal();
    document.querySelector('input[name="action"]').value = 'update';
    document.getElementById('todo_id').value = todoId;
    // Set form values with AJAX here
}

function toggleTodo(todoId) {
    // Redirect to toggle endpoint
    window.location.href = '?toggle=' + todoId;
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('todoModal');
    if (event.target == modal) {
        modal.classList.remove('show');
    }
}
