Validator({
    form: '.changepw-form',
    formGroupSelector: '.changepw-item',
    errorSelector: '.alert-error',
    rules: [
        Validator.isRequired('#stuDoB', 'This field can not empty'),
        Validator.isRequired('#stuPhone', 'This field can not empty'),
        Validator.isPhone('#stuPhone', 'This is not a phone number'),
        Validator.isValidPhone('#stuPhone', 'Invalid phone number ')

    ],
    // onSubmit: function(data) {
    //     console.log(data)
    // }
});