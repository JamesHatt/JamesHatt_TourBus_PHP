window.onload = function () {
    
    // define an event listener for the '#createProgrammerForm'
    
    var createBusForm = document.getElementById('createBusForm');
    if (createBusForm !== null) {
        createBusForm.addEventListener('submit', validateBusForm);
    }

    function validateBusForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }


    // define an event listener for the '#createProgrammerForm'

    var editBusForm = document.getElementById('editBusForm');
    if (editBusForm !== null) {
        editBusForm.addEventListener('submit', validateBusForm);
    }

    // define an event listener for any '.deleteProgrammer' links
    var deleteLinks = document.getElementsByClassName('deleteBus');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this bus?")) {
            event.preventDefault();
        }
    }

};