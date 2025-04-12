document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize Bootstrap modals
    var modalTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="modal"]'));
    modalTriggerList.forEach(function (modalTriggerEl) {
        modalTriggerEl.addEventListener('click', function() {
            var targetModal = document.querySelector(modalTriggerEl.getAttribute('data-bs-target'));
            var modalInstance = new bootstrap.Modal(targetModal);
            modalInstance.show();
        });
    });

    // Handle form submissions (example)
    var form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Add form submission logic here
            alert('Form submitted!');
        });
    }
});