<x-layout>

    <div class="content-container">
        <x-card title="Данные пациента" />
        <div class="patient-card">
            <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Имя:</div>
                <div class="patient-card-data">{{$patient->name}}</div>
            </div>
            </div>
            <div class="patient-card-wrap">
                <div class="patient-card-row">
                    <div class="patient-card-title">Фамилие:</div>
                    <div class="patient-card-data">{{$patient->lastname}}</div>
                </div>
                </div>
            <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Адрес:</div>
                <div class="patient-card-data">{{$patient->address}}</div>
            </div>
            </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Диагноз:</div>
                <div class="patient-card-data">{{$patient->diagnose}}</div>
            </div>
           </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Дата заболевания:</div>
                <div class="patient-card-data">{{$patient->diseaseDate}}</div>
            </div>
           </div>
           <div class="patient-card-wrap">
            <div class="patient-card-row">
                <div class="patient-card-title">Лечащий врач:</div>
                <div class="patient-card-data">{{$patient->chargedDoctor}}</div>
            </div>
           </div>
        </div>
    </div>
</x-layout>