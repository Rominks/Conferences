import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.datepicker').forEach((item) => {
        flatpickr(item, {
            mode: 'range'
        });
        console.log('aaaaaaaaaaaaaaaaaa');
    });
});
