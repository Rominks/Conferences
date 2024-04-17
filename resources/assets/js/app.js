import 'bootstrap';
import $ from 'jquery';

// $(document).ready(function() {
//     $('[data-toggle="modal"]').on('click', function() {
//         const targetModalId = $(this).data('target');
//         $(targetModalId).show();
//     });
// });

// document.addEventListener('DOMContentLoaded', () => {
    const editCloseBtn = document.getElementById('edit-close-btn');
    const editSubmitBtn = document.getElementById('edit-submit-btn')

    editCloseBtn.addEventListener('click', () => {
        window.location.href = "/articles/list/en";
    });

    // editSubmitBtn.addEventListener('click', () => {
    //     const form = document.getElementById('update-form');
    //     const formData = new FormData(form);
    //     fetch(form.action, {
    //         method: 'PUT',
    //         body: formData
    //     }).then(response => {
    //         if (response.ok) {
    //             window.location.href = "/articles/list/en";
    //         } else {
    //             throw Error;
    //         }
    //     }).catch(Error => {
    //         console.log('Update failed', Error)
    //     })
    // });

// });
