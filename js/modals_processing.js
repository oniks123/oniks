$(document).ready(function () {
    const forms = document.querySelectorAll("#form_account_for_popup")
    forms.forEach(element => {
        element.addEventListener("submit", function(event)  {
            event.preventDefault();
            $.post("../core/form_processing.php", $(this).serialize(), function (data) {
                console.log(data);
                $('#login_modal').val(data.login);
                $('#name_modal').val(data.name);
                $('#number_modal').val(data.number);
                $('#email_modal').val(data.email);
                $('#user_id_modal').val(data.user_id);
            }, 'JSON');  
        })
    });          
});