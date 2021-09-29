$(document).ready(function ($) {

    /**
     * Convert a get method to a post method
     * Include partial to the blade: partials/post-form.blade.php
     * Add class="href-as-post--js" to the link
     * Add attribute data-attr-confirm-dialog="true" to the link if you want a confirm dialog to popup
     */
    $('.href-as-post--js').on('click', function (event) {
        event.preventDefault();
        let hasConfirmDialog = $(this).attr('data-attr-confirm-dialog');
        let submit = true;
        if (Boolean(hasConfirmDialog)) {
            submit = confirm('Are you sure ?');
        }
        if (submit) {
            let route = $(this).attr('href');
            let postForm = $('.post-form--js');
            postForm.attr('action', route);
            postForm.submit();
        }
    });

});
