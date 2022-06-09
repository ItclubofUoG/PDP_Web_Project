Validator({
    form: '.changepw-form',
    formGroupSelector: '.changepw-item',
    errorSelector: '.alert-error',
    rules: [
        Validator.isRequired('#oldpass', 'This field can not empty'),
        Validator.isRequired('#newpassword', 'This field can not empty'),
        Validator.isRequired('#confirmpassword', 'This field can not empty'),
        Validator.isPassword('#oldpass', 6, 20, 'Password must be 6 to 20 characters'),
        Validator.isPassword('#newpassword', 6, 20, 'Password must be 6 to 20 characters'),
        Validator.isPassword('#confirmpassword', 6, 20, 'Password must be 6 to 20 characters'),
        Validator.isConfirmed('#confirmpassword', function (){
                    return document.querySelector('.changepw-form #newpassword').value;
        },'Password not math')
    ],
    // onSubmit: function(data) {
    //     console.log(data)
    // }
    });