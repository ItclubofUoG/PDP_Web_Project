// Manage Admin File
Validator({
    form: '#updateAd',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#adnameupdate', 'This field can not empty'),
        Validator.isRequired('#admailupdate', 'This field can not empty'),
        Validator.isEmail('#admailupdate', 'This is not an email'),
    ],
}); 
Validator({
    form: '#addAd',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#adnameadd', 'This field can not empty'),
        Validator.isRequired('#admailadd', 'This field can not empty'),
        Validator.isEmail('#admailadd', 'This is not an email'),
    ],
}); 



// Manage Course File
Validator({
    form: '#updatecourse',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#updatecoursename', 'This field can not empty'),
    ],
}); 

Validator({
    form: '#addcourse',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#addcoursename', 'This field can not empty'),
    ],
}); 


// Manage Device File
Validator({
    form: '#adddevice',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#adddevicename', 'This field can not empty'),
        Validator.isRequired('#adddevicelocation', 'This field can not empty'),
    ],
}); 
 

// Manage Event
Validator({
    form: '#eventadd',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#eventtitle', 'This field can not empty'),
        Validator.isRequired('#eventdate', 'This field can not empty'),
        Validator.isRequired('#eventtimestart', 'This field can not empty'),
        Validator.isRequired('#eventtimeend', 'This field can not empty'),
        Validator.isRequired('#eventlocation', 'This field can not empty'),
        Validator.isRequired('#eventdescription', 'This field can not empty'),
        Validator.isRequired('#eventscore', 'This field can not empty'),
    ],
}); 

Validator({
    form: '#eventupdate',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#updatetitle', 'This field can not empty'),
        Validator.isRequired('#updatedate', 'This field can not empty'),
        Validator.isRequired('#updatetimestart', 'This field can not empty'),
        Validator.isRequired('#updatetimeend', 'This field can not empty'),
        Validator.isRequired('#updatelocation', 'This field can not empty'),
        Validator.isRequired('#updatedescription', 'This field can not empty'),
        Validator.isRequired('#updatescore', 'This field can not empty'),
    ],
}); 

// Manage Major File
Validator({
    form: '#updateuser',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#userdob', 'This field can not empty'),
        Validator.isRequired('#userphone', 'This field can not empty'),
        Validator.isRequired('#cardnumber', 'This field can not empty'),
        Validator.isRequired('#userscore', 'This field can not empty'),

    ],
}); 

