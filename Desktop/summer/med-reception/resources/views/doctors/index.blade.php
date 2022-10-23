<x-layout>
    <div class="delete-doctor-blackout">
<div class="delete-doctor-modal">
    Подтвердите удаление врача
        <div class="delete-doctor-modal__btns-row">
            <button id="delete-doctor-modal__btns-no" class="delete-doctor-modal__btns-no delete-doctor-modal__btns">Нет</button>
            <button id="delete-doctor-modal__btns-yes" class="delete-doctor-modal__btns-yes delete-doctor-modal__btns">Да</button>
        </div>
</div>
</div>
    <div class="content-container">
       <x-card title="Список врачей"/>
       <a href="/patients/create"><button class="patient-create-btn form__btn-submit">Добавить пациента</button></a>
        <div class="patient-list">
            <table class="table table-striped">
                <tr>
                    <th>Имя</th>
                    <th>Номер офиса</th>
                    <th>Номер участка</th>
                    <th>Дни работы</th>
                    <th>Часы приема</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($doctors as $doctor)
                        <tr> 
                            <td>
                                {{$doctor->name}}
                            </td>
                            <td>
                                {{$doctor->officeNumber}}
                            </td>
                            <td>
                                {{$doctor->areaNumber}}
                            </td>
                            <td>
                                {{$doctor->workingDays}}
                            </td>
                            <td>
                                {{$doctor->startTime}}
                            </td>
                            <td>
                                {{$doctor->endTime}}
                            </td>
                            <td>
                                <a href="/doctors/{{$doctor->id}}" class="doctor-view patient__item-btns"><img src="{{asset('images/view.png')}}" alt=""></a>
                                <div href="/patients/{{$doctor->id}}" class="doctor-delete patient__item-btns" data-id="{{$doctor->id}}"><img src="{{asset('images/trash.png')}}" alt=""></div>
                            </td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>

<script src="{{asset('js/doctor.js')}}"></script>
</x-layout>