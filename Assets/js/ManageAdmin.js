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
        Validator.isRequired('#eventscore', 'This field can not empty'),
        Validator.isRequired('#eventscoreplus', 'This field can not empty'),
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
        Validator.isRequired('#updatescore', 'This field can not empty'),
        Validator.isRequired('#updatescoreplus', 'This field can not empty'),
        Validator.isScore('#updatescore', 'Score must be greater than 0'),
    ],
}); 

// Manage Student File
Validator({
    form: '#updateuser',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#student_id', 'This field can not empty'),
        Validator.isRequired('#fullname', 'This field can not empty'),
        Validator.isRequired('#email', 'This field can not empty'),
        Validator.isRequired('#dob', 'This field can not empty'),
        Validator.isRequired('#phone', 'This field can not empty'),
        Validator.isRequired('#card_uid', 'This field can not empty'),
        Validator.isPhone('#phone', 'This is not a phone number'),
        Validator.isValidPhone('#phone', 'Invalid phone number ')
    ],
}); 

// Manage Major file
Validator({
    form: '#addmajor',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#addmajorname', 'This field can not empty'),
    ],
}); 
Validator({
    form: '#updatemajor',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#updatemajorname', 'This field can not empty'),
    ],
}); 

// User log
Validator({
    form: '#userlog',
    formGroupSelector: '.modal-input',
    errorSelector: '.alert-error-modal',
    rules: [
        Validator.isRequired('#logid', 'This field can not empty')
    ],
});
