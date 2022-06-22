function Validator(options){
    function getParent(element,selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element=element.parentElement;
        }
    }
    var formElement=document.querySelector(options.form);
    var selectorRules={};
    function validate(inputElement, rule){
        var errorElement=getParent(inputElement,options.formGroupSelector).querySelector(options.errorSelector)
        var errorMessage
        //get all rules of selector
        var rules =selectorRules[rule.selector];
        //check all rules
        for(var i=0;i<rules.length;i++){
            errorMessage=rules[i](inputElement.value);
            if(errorMessage) break
        }
        if(errorMessage){
            errorElement.innerText=errorMessage;
            errorElement.classList.add('error','errors')
            // getParent(inputElement,options.formGroupSelector).classList.add('error','errors')
        }else{
            errorElement.innerText=''
            // getParent(inputElement,options.formGroupSelector).classList.remove('error','errors')
            errorElement.classList.remove('error','errors')
        }
        return !errorMessage
    }
    if(formElement){
        //remove default behavior when submit
        formElement.onsubmit=function (e) {
            e.preventDefault();
            var isValid=true;
            isFormValid=true;
            options.rules.forEach(function (rule){
                var inputElement=formElement.querySelector(rule.selector);
                var isValid=validate(inputElement,rule);
                if (!isValid){
                    isFormValid=false;
                }
            });
            if(isFormValid){
                if(typeof options.onSubmit==='function'){
                    var enableInputs=formElement.querySelectorAll('[name]')
                    var formValues=Array.form(enableInputs).reduce(function (values, enableInputs){
                        values[input.name]=input.value
                    },{});
                    options.onSubmit(formValues);
                }
                else{
                    formElement.submit();
                    return true
                }
            }
        }
        options.rules.forEach(function (rule){
            var inputElement=formElement.querySelector(rule.selector);
            if(Array.isArray(selectorRules[rule.selector]))
            {
                selectorRules[rule.selector].push(rule.test)
            }else{
                selectorRules[rule.selector]=[rule.test];
            }
            if(inputElement){
                inputElement.onblur= function() {
                    validate(inputElement,rule);
                }
                inputElement.oninput=function (){
                    var errorElement=getParent(inputElement,options.formGroupSelector).querySelector(options.errorSelector)
                    errorElement.innerText=''
                    // getParent(inputElement,options.formGroupSelector).classList.remove('invalid')
                    errorElement.classList.remove('error','errors')
                }
            }
        });
    }
}
Validator.isRequired=function(selector,message){
 return {
     selector: selector,
     test: function(value){
        return value.trim() ? undefined : message||'please enter feild'
     }
 }
}
Validator.isEmail=function(selector,message){
    return {
        selector: selector,
        test: function(value){
            var regex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message||'Erorr'
        }
    }
}
Validator.isPassword=function(selector,min,max,message){
    return {
        selector: selector,
        test: function(value){
            return value.length>=min && value.length<=max ? undefined : message||'Length error'
        }
    }
}
Validator.isConfirmed = function(selector,getConfirmValue,message){
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : message||'Not math'
        }
    }
}
// Validator.isSizeImage = function(selector,getConfirmValue,message){
 
//     let realWidth = value.naturalWidth;
//     let realHeight = value.naturalHeight;
//     console.log(realWidth)
// }

CheckSizeImage=function(selector,form,error,formGroupSelector,message,errorclass){
    // fileInput=document.querySelector(selector);
    //Get reference of File.
    var fileUpload = document.querySelector(selector);
    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (true) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height != 400 || width != 940) {
                        AddError(fileUpload,form,formGroupSelector,error,message,errorclass);
                    }
                    else{
                        RemoveError(fileUpload,form,formGroupSelector,error,message,errorclass)
                    }
                };
 
            }
        } else {
            AddError(fileUpload,form,formGroupSelector,error,"This browser does not support HTML5.",errorclass);
        }
    } else {
        AddError(fileUpload,form,formGroupSelector,error,"Please select a valid Image file.",errorclass);
    }
    // let realWidth = fileInput.naturalWidth;
    // let realHeight = fileInput.clientHeight;
    // console.log(fileInput);
    // console.log(realHeight);
    // console.log(realWidth);
    // if ((realHeight!= 300) && (realWidth!=450)) {
    //     AddError(fileInput,form,formGroupSelector,error,message,errorclass);
    // }else{
    //     var filePath = fileInput.value;
    //     // Allowing file type
    //     var allowedExtensions =/(\.jpg|\.jpeg|\.png|\.gif)$/i;
                 
    //     if (!allowedExtensions.exec(filePath)) {
    //         AddError(fileInput,form,formGroupSelector,error,message,errorclass);
    //     }
    //     else
    //     {    
    //         RemoveError(fileInput,form,formGroupSelector,error,message,errorclass)
    //     }
    // }
}
function getParent(element,selector){
    while(element.parentElement){
        if(element.parentElement.matches(selector)){
            return element.parentElement;
        }
        element=element.parentElement;
    }
}
AddError=function(inputElement,form,formGroupSelector,error,message,errorclass){
    var errorElement=getParent(inputElement,formGroupSelector).querySelector(error)
    errorElement.innerText=message;
    errorElement.classList.add(errorclass)
    var formElement=document.querySelector(form);
    formElement.onsubmit=function (e) {
        e.preventDefault();
    }
}
RemoveError=function(inputElement,form,formGroupSelector,error,message,errorclass){
    var errorElement=getParent(inputElement,formGroupSelector).querySelector(error)
    errorElement.innerText="";
    errorElement.classList.remove(errorclass)
    var formElement=document.querySelector(form);
    formElement.submit()

}