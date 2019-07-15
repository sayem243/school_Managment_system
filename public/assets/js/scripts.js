$(document).ready(function () {
    if (typeof $.cookie('cookieId') === 'undefined'){
        $.cookie('cookieId','home');
        $("#home").addClass("selected");
    }else{
        $("#"+$.cookie('cookieId')).addClass("selected");
    }
    $(document).on('click', '.menu', function () {
        $cookieName = $(this).attr('id');
        $.removeCookie('cookieId');
        $.cookie('cookieId',$cookieName);
        $("body").removeClass("closedMenu");
        $(".menu").removeClass("selected");
        $("#"+$cookieName).addClass("selected");
    });

    $('#editor').summernote({
        placeholder: 'Hello bootstrap 4',
        tabsize: 2,
        height: 100
    });

});
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
    $('[data-toggle="tooltip"]').tooltip();
    $('button').tooltip({container: 'body'});
    $('select').each(function () {
        $(this).select2({
            theme: 'bootstrap4',
            width: 'style',
            placeholder: $(this).attr('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    });
})();