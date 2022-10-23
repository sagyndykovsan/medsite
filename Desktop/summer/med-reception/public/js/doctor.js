let doctorDeleteBtns = document.querySelectorAll('.doctor-delete');
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let deleteDoctorBtnYes = document.querySelector('#delete-doctor-modal__btns-yes');
let deleteDoctorBtnNo = document.querySelector('#delete-doctor-modal__btns-no');
let deleteDoctorBlackout = document.querySelector('.delete-doctor-blackout');
let doctorId;

doctorDeleteBtns.forEach(element => {
    element.addEventListener('click', e => {
        deleteDoctorBlackoutShow();
        doctorId = element.getAttribute('data-id');
    });
});
deleteDoctorBtnNo.addEventListener('click', e => {
        deleteDoctorBlackoutHide();
});

deleteDoctorBtnYes.addEventListener('click', e => {
    fetch(`http://localhost:8000/api/doctors/${doctorId}`, {
        method: 'DELETE',
        headers: {
            'Content-type': 'application/json;charset=utf-8'
        },
        'X-CSRF-Token': token,
    }).then(response => response.text())
    .then((r) => {
        deleteDoctorBlackoutHide();
        location.reload();
    });
});

function deleteDoctorBlackoutShow() {
    deleteDoctorBlackout.style.display = 'flex';
}

function deleteDoctorBlackoutHide() {
    deleteDoctorBlackout.style.display = 'none';
}