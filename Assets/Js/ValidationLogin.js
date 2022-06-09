const email = document.querySelector('.email')
const alert = document.querySelector('.alert')
    //Email regular expression
    const patternEmail = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/
    function checkText (){
        if (email.value.length == 0) {
            //When the user still not input the alert will be not display
            alert.style.padding ='0'
            // Set the empty content
            alert.textContent = ''
        }
        else {
            //have input s.t into email box
            if (email.value.match(patternEmail))
            {
                //right email pattern
                alert.textContent= 'Email valid'
                alert.style.color = '#14f0ba'
            }
            else{
                //do not right email pattern
                alert.style.padding='0px 20px'
                alert.textContent = 'Invalid email'
                alert.style.color = '#f0144B'
            }
        }
    }
    email.addEventListener('keyup',(event) => {
        // console.log(event.target.value)
        checkText()
    })
    //not display when load the page
    checkText()



