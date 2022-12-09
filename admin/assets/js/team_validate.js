const mname = document.getElementById('mname');
const mdesg = document.getElementById('mdesg');
const mform = document.getElementById('teamForm');

var namepattern = /^[a-zA-Z ]{2,30}$/;

mform.addEventListener('submit', (e) => {
    let nmessages = "";
    let desg_messages = "";
    const cn = namepattern.test(mname.value);
    const cdesg = namepattern.test(mdesg.value);
    if (!cn) {
        nmessages = "Invalid Name!";
    }
    if(!cdesg){
        desg_messages = "Invalid Designation";
    }

    if (nmessages.length > 0 || desg_messages.length > 0) {
        e.preventDefault();
        nmessages = "";
        desg_messages = "";
    }
})






const umname = document.getElementById('umname');
const umdesg = document.getElementById('umdesg');
const umform = document.getElementById('uTeamForm');

umform.addEventListener('submit', (e) => {
    let unmessages = "";
    let udesg_messages = "";
    const ucn = namepattern.test(umname.value);
    const udesg = namepattern.test(umdesg.value);
    if (!ucn) {
        unmessages = "Invalid Name!";
    }
    if(!udesg){
        udesg_messages = "Invalid Designation";
    }

    if (unmessages.length > 0 || udesg_messages.length > 0) {
        e.preventDefault();
        unmessages = "";
        udesg_messages = "";
    }
    console.log(ucn);
})




function myName() {
    const mname = document.getElementById('mname');
    var namepattern = /^[a-zA-Z ]{2,30}$/;
    const error1 = document.getElementById('error1');

    const cn = namepattern.test(mname.value);

    if (!cn) {
        error1.innerText = "*Invalid Name";
    }
    else {
        error1.innerText = "";
    }


}

function uMyName(){
    const umname = document.getElementById('umname');
    var namepattern = /^[a-zA-Z ]{2,30}$/;
    const uerror1 = document.getElementById('uerror1');

    const ucn = namepattern.test(umname.value);

    if (!ucn) {
        uerror1.innerText = "*Invalid Name";
    }
    else {
        uerror1.innerText = "";
    }

}

function myDesg() {

    const mdesg = document.getElementById('mdesg');
    var pattern = /^[a-zA-Z ]{2,30}$/;
    const error2 = document.getElementById('error2');
    const cdesg = pattern.test(mdesg.value);
    if (!cdesg) {
        error2.innerText = "*Invalid Designation";
    }
    else {
        error2.innerText = "";
    }
}


function uMyDesg(){

    const umdesg = document.getElementById('umdesg');
    var pattern = /^[a-zA-Z ]{2,30}$/;
    const uerror2 = document.getElementById('uerror2');
    const ucdesg = pattern.test(umdesg.value);
    if (!ucdesg) {
        uerror2.innerText = "*Invalid Designation";
    }
    else {
        uerror2.innerText = "";
    }
}

