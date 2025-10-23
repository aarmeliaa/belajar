function confirmDeletion(){
    var message = "Apakah Anda yakin ingin menghapus data ini? Semua mata data yang terkait dengannya juga akan terhapus!";
    return confirm(message);
}

document.addEventListener('DOMContentLoaded', function() {
    var sidebarToggle = document.getElementById('sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            document.body.classList.toggle('toggled');
        });
    }
    // Search functionality for Dashboard (Semesters)
    var searchSemesterInput = document.getElementById('searchSemester');
    if (searchSemesterInput) {
        searchSemesterInput.addEventListener('keyup', function() {
            var filter = searchSemesterInput.value.toLowerCase();
            var semesterCards = document.querySelectorAll('#semesterList .semester-card-col');

            semesterCards.forEach(function(card) {
                var title = card.querySelector('.card-title').textContent.toLowerCase();
                var description = card.querySelector('.card-text').textContent.toLowerCase();
                if (title.includes(filter) || description.includes(filter)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Search functionality for Courses
    var searchCourseInput = document.getElementById('searchCourse');
    if (searchCourseInput) {
        searchCourseInput.addEventListener('keyup', function() {
            var filter = searchCourseInput.value.toLowerCase();
            var courseCards = document.querySelectorAll('#courseList .course-card-col');

            courseCards.forEach(function(card) {
                var title = card.querySelector('.card-title').textContent.toLowerCase();
                var code = card.querySelector('.card-subtitle').textContent.toLowerCase();
                var description = card.querySelector('.card-text').textContent.toLowerCase();
                if (title.includes(filter) || code.includes(filter) || description.includes(filter)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Toggle Material Content (Materials page)
    document.querySelectorAll('.toggle-material-content').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                if (targetElement.style.display === 'none' || targetElement.style.display === '') {
                    targetElement.style.display = 'block';
                    this.textContent = 'Sembunyikan Teks';
                } else {
                    targetElement.style.display = 'none';
                    this.textContent = 'Lihat Teks';
                }
            }
        });
    });

    // Populate Edit Semester Modal
    var editSemesterModal = document.getElementById('editSemesterModal');
    if (editSemesterModal) {
        editSemesterModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var description = button.getAttribute('data-description');

            var modalIdInput = editSemesterModal.querySelector('#editSemesterId');
            var modalNameInput = editSemesterModal.querySelector('#editName');
            var modalDescriptionInput = editSemesterModal.querySelector('#editDescription');

            modalIdInput.value = id;
            modalNameInput.value = name;
            modalDescriptionInput.value = description;
        });
    }

// Populate Edit Course Modal
    var editCourseModal = document.getElementById('editCourseModal');
    if (editCourseModal) {
        editCourseModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; 
            
            var id = button.getAttribute('data-id');
            var semesterId = button.getAttribute('data-semester-id');
            var code = button.getAttribute('data-code');
            var name = button.getAttribute('data-name');
            var description = button.getAttribute('data-description');

            console.log('--- DEBUG: Edit Course Modal Data ---'); // Ini akan muncul di Console browser
            console.log('ID:', id);
            console.log('Semester ID:', semesterId);
            console.log('Code:', code);
            console.log('Name:', name);
            console.log('Description:', description);
            console.log('-----------------------------------');

            var modalIdInput = editCourseModal.querySelector('#editCourseId');
            var modalSemesterSelect = editCourseModal.querySelector('#editSemester');
            var modalCodeInput = editCourseModal.querySelector('#editCourseCode');
            var modalNameInput = editCourseModal.querySelector('#editCourseName');
            var modalDescriptionInput = editCourseModal.querySelector('#editDescription');

            // Penting: tambahkan pengecekan `if (elemen)` sebelum menetapkan `value`
            if (modalIdInput) modalIdInput.value = id;
            if (modalCodeInput) modalCodeInput.value = code;
            if (modalNameInput) modalNameInput.value = name;
            if (modalDescriptionInput) modalDescriptionInput.value = description;

            if (modalSemesterSelect) {
                modalSemesterSelect.value = semesterId;
            }
        });
    }

    // Populate Edit CPMK Modal
    var editCpmkModal = document.getElementById('editCpmkModal');
    if (editCpmkModal) {
        editCpmkModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var courseId = button.getAttribute('data-course-id'); // Get the course ID
            var cpmkDescription = button.getAttribute('data-cpmk-description');

            var modalIdInput = editCpmkModal.querySelector('#editCpmkId');
            var modalCourseSelect = editCpmkModal.querySelector('#editCourseCpmk');
            var modalCpmkDescriptionInput = editCpmkModal.querySelector('#editCpmkDescription');

            modalIdInput.value = id;
            modalCpmkDescriptionInput.value = cpmkDescription;

            // Set the selected course in the dropdown
            modalCourseSelect.value = courseId; // Use the actual ID
        });
    }

    // Populate Edit Material Modal
    var editMaterialModal = document.getElementById('editMaterialModal');
    if (editMaterialModal) {
        editMaterialModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var cpmkId = button.getAttribute('data-cpmk-id'); // Get the cpmk ID
            var title = button.getAttribute('data-title');
            var content = button.getAttribute('data-content');
            var link = button.getAttribute('data-link');

            var modalIdInput = editMaterialModal.querySelector('#editMaterialId');
            var modalCpmkSelect = editMaterialModal.querySelector('#editCpmkMaterial');
            var modalTitleInput = editMaterialModal.querySelector('#editMaterialTitle');
            var modalContentInput = editMaterialModal.querySelector('#editMaterialContent');
            var modalLinkInput = editMaterialModal.querySelector('#editMaterialLink');

            modalIdInput.value = id;
            modalTitleInput.value = title;
            modalContentInput.value = content;
            modalLinkInput.value = link;

            // Set the selected CPMK in the dropdown
            modalCpmkSelect.value = cpmkId; // Use the actual ID
        });
    }
});