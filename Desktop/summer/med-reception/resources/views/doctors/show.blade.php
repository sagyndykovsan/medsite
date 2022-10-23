<x-layout>

    <div class="content-container">
        <x-card title="Данные пациента" />
        <div class="patient-card">
            <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Имя:</div>
                <div class="patient-card-data">{{$doctor->name}}</div>
            </div>
            </div>
            <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Номер офиса:</div>
                <div class="patient-card-data">{{$doctor->officeNumber}}</div>
            </div>
            </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Номер участка:</div>
                <div class="patient-card-data">{{$doctor->areaNumber}}</div>
            </div>
           </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Дни работы:</div>
                <div class="patient-card-data">{{$doctor->workingDays}}</div>
            </div>
           </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Часы приема:</div>
                <div class="patient-card-data">{{$doctor->startTime}}-{{$doctor->endTime}}</div>
            </div>
           </div>
        </div>
    </div>
</x-layout>