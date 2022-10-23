<x-layout>

    {{-- HEADER LAYOUT --}}


    <div class="form-wrap container">
        
    <h3 class="form-title">
        Добавление пациента
    </h3>
    <hr>
    <form action="/patients/post" method="post"  enctype="multipart/form-data" >
        @csrf
        <div class="group-form mb-4">
            <label for="name" class="form__label">Имя пациента</label>
            <span><input id="name" name="name" type="text" value="{{ old('name') }}" class="sb-form-control" placeholder="Имя пациента"></span>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="lastname" class="form__label">Фамилие пациента</label>
            <span><input id="lastname"name="lastname" type="text" value="{{ old('lastname') }}" class="sb-form-control" placeholder="Фамилие пациента"></span>
            @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="address" class="form__label">Адрес пациента</label>
            <span><input id="address" type="text" name="address" value="{{ old('address') }}" class="sb-form-control" placeholder="Адрес пациента"></span>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="diagnose" class="form__label">Диагноз пациента</label>
            <span><input id="diagnose" type="text" name="diagnose" value="{{ old('diagnose') }}" class="sb-form-control" placeholder="Диагноз"></span>
            @error('diagnose')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="diseaseDate" class="form__label">Дата заболевания</label>
            <span><input id="diseaseDate" type="date" name="diseaseDate" value="{{ old('diseaseDate') }}" class="sb-form-control" placeholder="Дата заболевния"></span>
            @error('diseaseDate')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="chargedDoctor" class="form__label">Лечащий врач</label>
            <span><input id="chargedDoctor" type="text" name="chargedDoctorId" value="{{ old('chargedDoctor') }}" class="sb-form-control" placeholder="Лечащий врач"></span>
            @error('chargeDoctorId')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input id="chargedDoctorId" name="chargedDoctorId" type="text" hidden>
            <div class="form__doctors-menu">
                <div class="form__doctors-list">
                </div>
            </div>
        </div>
        <div class="group-form mb-4">
            <label for="insurance-code" class="form__label">Номер страховки</label>
            <span><input id="insuranceCode" type="text" name="insuranceCode" value="{{ old('insuranceCode') }}" class="sb-form-control" placeholder="Номер страховки"></span>
            @error('insuranceCode')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="group-form mb-4">
            <label for="insuranceCompany" class="form__label">Имя страховой компании</label>
            <span><input id="insuranceCompany" type="text" name="insuranceCompany" value="{{ old('insuranceCompany') }}" class="sb-form-control" placeholder="Имя страховой компании"></span>
            @error('insuranceCompany')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button class="form__btn-submit">Добавить пациента</button>
        </form>    
    </div>
    {{-- FOOTER LAYOUT --}}
    <script src="{{asset('js/main.js')}}"></script>
</x-layout>