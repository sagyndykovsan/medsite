<x-layout>
    <div class="content-container">
        <x-card title="Изменение пациента"/>
    <form action="/patients/{{$patient->id}}" method="post"  enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="group-form mb-4">
            <label for="name" class="form__label">Имя пациента</label>
            <span><input id="name"name="name" type="text" value="{{ $patient->name }}" class="sb-form-control" placeholder="Имя пациента" disabled></span>
        </div>
        <div class="group-form mb-4">
            <label for="lastname" class="form__label">Фамилие пациента</label>
            <span><input id="lastname" name="lastname" type="text" value="{{ $patient->lastname }}" class="sb-form-control" placeholder="Фамилие пациента" disabled
                disabled></span>
        </div>
        <div class="group-form mb-4">
            <label for="address" class="form__label">Адрес пациента</label>
            <span><input id="address" type="text" name="address" value="{{ $patient->address }}" class="sb-form-control" placeholder="Адрес пациента"></span>
        </div>
        <div class="group-form mb-4">
            <label for="diagnose" class="form__label">Диагноз пациента</label>
            <span><input id="diagnose" type="text" name="diagnose" value="{{ $patient->diagnose }}" class="sb-form-control" placeholder="Диагноз"></span>
        </div>
        <div class="group-form mb-4">
            <label for="diseaseDate" class="form__label">Дата заболевания</label>
            <span><input id="diseaseDate" type="date" name="diseaseDate" value="{{ $patient->diseaseDate }}" class="sb-form-control" placeholder="Дата заболевния"></span>
        </div>
        <div class="group-form mb-4">
            <label for="insuranceCode" class="form__label">Номер страховки</label>
            <span><input id="insuranceCode"type="text" name="insuranceCode" value="{{ $patient->insuranceCode }}" class="sb-form-control" placeholder="Номер страховки"></span>
        </div>
        <div class="group-form mb-4">
            <label for="insuranceCompany" class="form__label">Имя страховой компании</label>
            <span><input id="insuranceCompany" type="text" name="insuranceCompany" value="{{ $patient->insuranceCompany }}" class="sb-form-control" placeholder="Имя страховой компании"></span>
        </div>
        
        <button class="form__btn-submit">Сохранить изменения</button>
        </form>    
    </div>
</x-layout>