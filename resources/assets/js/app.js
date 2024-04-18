import './bootstrap';
import 'jquery';
import flatpickr from "flatpickr";

$(document).ready(function () {
    const langSelection = $('#locale-selection');
    const editCloseBtn = $('#edit-close-btn');
    const createCloseBtn = $('#create-close-btn');
    const token = $('#token').val();
    const datepicker = $('#flatpickr-date');
    let locale = 'en';

    langSelection.on('change', function (e) {
        e.preventDefault();
        changeLocale(langSelection.val());
    });

    createCloseBtn.on('click', function (e) {
        e.preventDefault();
        window.location.href = "/articles/list/" + locale;
    });

    $('.modal-toggle').on('click', function () {
        var targetModalId = $(this).data('modal');
        $(targetModalId).addClass('active');
    });

    $('.modal-close').on('click', function () {
        $('.modal').removeClass('active');
    });

    $('.btn-edit-article').on('click', function(e) {
        e.preventDefault();
        const articleId = $(this).data('article-id');
        console.log(articleId);

        $('#modal-submit-btn').data('article-id', articleId);
        $('#articleModal').addClass('active');
    });

    $('#modal-submit-btn').on('click', function (e) {
        e.preventDefault();
        const articleId = $(this).data('article-id');
        const articleUrl = '/articles/update/' + articleId;
        const datetime = $('#flatpickr-date' + articleId).val();
        $.ajax({
            type: 'PUT',
            url: articleUrl,
            data: {
                _token: token,
                id: articleId,
                title: `${ $('#title' + articleId).val() }`,
                address: `${ $('#address' + articleId).val() }`,
                attendance: `${ $('#attendance' + articleId).val() }`,
                content: `${ $('#content'+ articleId).val() }`,
                dateTime: datetime,
            },
            success: function (response) {
                $('.modal').removeClass('active');
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Form submission error:', error);
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('.error_' + key).html(' <span class="text-danger">' + value[0] + '</span>');
                    });
                }
            }
        });
    });

    $('#modal-create-btn').on('click', function (e) {
        e.preventDefault();
        const articleUrl = '/articles/submit'
        $.ajax({
            type: 'POST',
            url: articleUrl,
            data: {
                _token: token,
                title: `${ $('#title').val() }`,
                address: `${ $('#address').val() }`,
                attendance: `${ $('#attendance').val() }`,
                content: `${ $('#content').val() }`,
                dateTime: datepicker.val(),
            },
            success: function (response) {
                $('.modal').removeClass('active');
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Form submission error:', error);
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('.error_' + key).html(' <span class="text-danger">' + value[0] + '</span>');
                    });
                }
            }
        });
    });

    $('.btn-delete-article').on('click', function(e) {
        e.preventDefault();
        const articleId = $(this).data('delete-article-id');
        console.log(articleId);

        $('#confirm-delete-btn').data('delete-article-id', articleId);
        $('#deleteModal').addClass('active');
    });

    $('#confirm-delete-btn').on('click', function (e) {
        e.preventDefault();
        const articleId = $(this).data('delete-article-id');
        const articleUrl = '/articles/delete/' + articleId
        $.ajax({
            type: 'DELETE',
            url: articleUrl,
            data: {
                _token: token,
                id: articleId
            },
            success: function (response) {
                $('.modal').removeClass('active');
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error('Form submission error:', error);
            }
        });
    });

    flatpickr($('.flatpickr-calendar'), {
        dateFormat: 'Y-m-d',
        minDate: 'today',
        inline: true,
    });

    editCloseBtn.on('click', function (e) {
        e.preventDefault();
        window.location.href = "/articles/list/" + locale;
    });

    function changeLocale(locale) {
        $.ajax({
            type: 'POST',
            url: '/change-locale',
            data: {
                locale: locale,
                _token: token
            },
            success: function (response) {
                locale = response.locale;
                location.href = location.href.substring(0, location.href.length - 2) + locale;
            },
            error: function (xhr, status, error) {
                console.error('Error changing locale:', error);
            }
        });
    }
});
