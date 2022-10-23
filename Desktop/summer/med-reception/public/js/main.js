let chargedDoctor = document.querySelector('#chargedDoctor');
let chargedDoctorId = document.querySelector("#chargedDoctorId");
let doctorsMenu = document.querySelector('.form__doctors-menu');
let doctorsList = document.querySelector('.form__doctors-list');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let doctorId;
let doctorsClick = [];
let doctorDeleteBtns = document.querySelectorAll('.doctor-delete');

doctorDeleteBtns.forEach(element => {
    element.addEventListener('click', e => {
        alert('works');
    });
});

function onon(e) {
    hideDoctorsList();

    chargedDoctorId.value = e.currentTarget.getAttribute('data-id');
    chargedDoctor.value = e.currentTarget.innerText;
}

function hideDoctorsList() {
    doctorsMenu.style.display = "none";
}

class Doctor {
    constructor(doctorJson) {
        this.name = doctorJson.name;
        this.id = doctorJson.id;
    }

    render() {
        let element = document.createElement('div');
        this.html = element
        element.classList.add('doctor-item');
        element.setAttribute('data-id', this.id);
        element.addEventListener('click', onon);
        element.innerText = this.name;

        return element;
    }
}

chargedDoctor.addEventListener('input', function(e) {
    if (chargedDoctor.value.length != 0) {
        doctorsMenu.style.display = "block";


        fetch('http://localhost:8000/api/doctors', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json;charset=utf-8'
            },
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            body: JSON.stringify({
                name: chargedDoctor.value
            })
        }).then(response => response.json())
            .then(response => {
                console.log(response);
                doctorsList.innerHTML = "";
                response.users.forEach(element => {
                    let doctor = new Doctor(element);
                    doctorsList.appendChild(doctor.render());
                });
            });
    }

    if (chargedDoctor.value.length == 0) {
        doctorsMenu.style.display = "none";
        doctorsList.innerHTML = "";
    }
});