<x-layout>
@if(session()->has('message'))
<div x-data="{ open: true }">
    <span x-show="open" class="flash-message" x-init="setTimeout(() => open = false, 3000)">
      {{session('message')}}
    </span>
</div>
@endif
    <div class="content-container">
       <x-card title="Список пациентов"/>
       <a href="/patients/create"><button class="patient-create-btn form__btn-submit">Добавить пациента</button></a>
        <div class="patient-list">
            <table class="table table-striped">
                <tr>
                    <th>Имя</th>
                    <th>Фамилие</th>
                    <th>Адрес</th>
                    <th>Дата заболевания</th>
                    <th>Диагноз</th>
                    <th>Лечащий врач</th>
                    <th></th>
                </tr>
                @foreach ($patients as $patient)
                        <tr>
                            <td>
                                {{$patient->name}}
                            </td>
                            <td>
                                {{$patient->lastname}}
                            </td>
                            <td>
                                {{$patient->address}}
                            </td>
                            <td>
                                {{$patient->diseaseDate}}
                            </td>
                            <td>
                                {{$patient->diagnose}}
                            </td>
                            <td>
                                {{$patient->chargedDoctor}}
                            </td>
                            <td>
                                <a href="/patients/{{$patient->id}}" class="patient__item-view patient__item-btns"><img src="{{asset('images/view.png')}}" alt=""></a>
                                <a href="/patients/edit/{{$patient->id}}" class="patient__item-edit patient__item-btns"><img src="{{asset('images/edit.png')}}" alt=""></a>
                            </td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>


</x-layout>