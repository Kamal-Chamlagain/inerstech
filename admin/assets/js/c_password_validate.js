function cnewPassword() {
    const cpass = document.getElementById('newPassword');
    const error1 = document.getElementById('error1');
    if (cpass.value.length <= 6) {
      error1.innerText = "*Password must be longer than 6 digits";
    } else {
      error1.innerText = "";
    }
    rNewPassword();
  }

  function rNewPassword() {
    const cpass = document.getElementById('newPassword');
    const rcpass = document.getElementById('renewPassword');
    const error2 = document.getElementById('error2');
    const cerror1 = document.getElementById('error1');


    if (cpass.value != rcpass.value) {
      if (rcpass.value != "") {
        error2.innerText = "*Confirm Password doesnot match";
      }
    } else {
      error2.innerText = "";
    }
  }




  const cpform = document.getElementById('changepassword');

  const cerror1 = document.getElementById('error1');
  const cerror2 = document.getElementById('error2');



  cpform.addEventListener('submit', (e) => {



    if (error1.innerText.length > 0 || error2.innerText.length > 0) {
      e.preventDefault();
    }

  })