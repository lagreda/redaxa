@extends('layout')

@section('title', 'Repositorio de alumnos y ex alumnos')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Repositorio de alumnos y ex alumnos</h2>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Detalles</h3>
                    <button type="button" class="btn btn-info" onclick="window.print();">Imprimir</button>
                    <button type="button" class="btn btn-default" onclick="javascript: location = '{{ URL::to('student') }}';">Regresar</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="">
                        <h4>Datos básicos</h4>
                        <table class="table table-striped student_detail_table">
                            <thead>
                                <th class="col-xs-3"></th>
                                <th class="col-xs-9"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>Graduado de ESPAE</span>
                                    </td>
                                    <td>
                                        <b>
                                            @if($student->graduated_from_espae == "1")
                                            SI
                                            @else
                                            NO
                                            @endif
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Cédula</span>
                                    </td>
                                    <td><b>{{ $student->legal_id }}</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Nombre</span>
                                    </td>
                                    <td><b>{{ $student->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Apellido</span>
                                    </td>
                                    <td><b>{{ $student->surname }}</b></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Correo</span>
                                    </td>
                                    <td>{{ $student->main_email }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Celular</span>
                                    </td>
                                    <td>{{ $student->mobile_number }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Número de casa</span>
                                    </td>
                                    <td>{{ $student->home_number }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Número de trabajo</span>
                                    </td>
                                    <td>{{ $student->work_number }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Fecha de nacimiento</span>
                                    </td>
                                    <td>{{ $student->birth_date }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Dirección de domicilio</span>
                                    </td>
                                    <td>{{ $student->home_address_1 }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Sitio web</span>
                                    </td>
                                    <td>{{ $student->personal_url }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>URL LinkedIn</span>
                                    </td>
                                    <td>{{ $student->linkedin_url }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>URL Facebook</span>
                                    </td>
                                    <td>{{ $student->facebook_url }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>URL Twitter</span>
                                    </td>
                                    <td>{{ $student->twitter_url }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Código postal</span>
                                    </td>
                                    <td>{{ $student->zip_code }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>País de nacimiento</span>
                                    </td>
                                    <td>
                                        @if(count($student->countryBirth) > 0)
                                        {{ $student->countryBirth->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Ciudad (Ecuador) de nacimiento</span>
                                    </td>
                                    <td>
                                        @if(count($student->cityBirth) > 0)
                                        {{ $student->cityBirth->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>País de residencia</span>
                                    </td>
                                    <td>
                                        @if(count($student->countryResidence) > 0)
                                        {{ $student->countryResidence->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Ciudad (Ecuador) de residencia</span>
                                    </td>
                                    <td>
                                        @if(count($student->cityResidence) > 0)
                                        {{ $student->cityResidence->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Estado civil</span>
                                    </td>
                                    <td>
                                        @if(count($student->civilStatus) > 0)
                                        {{ $student->civilStatus->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Tipo de sangre</span>
                                    </td>
                                    <td>
                                        @if(count($student->bloodType) > 0)
                                        {{ $student->bloodType->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Género</span>
                                    </td>
                                    <td>
                                        @if(count($student->gender) > 0)
                                        {{ $student->gender->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Grupo étnico</span>
                                    </td>
                                    <td>
                                        @if(count($student->ethnicGroup) > 0)
                                        {{ $student->ethnicGroup->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Destacado</span>
                                    </td>
                                    <td>
                                        <b>
                                            @if($student->starred == "1")
                                            SI
                                            @else
                                            NO
                                            @endif
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Comentarios</span>
                                    </td>
                                    <td>
                                        {{ $student->comments }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>Educación</h4>
                        <table class="table table-striped student_detail_table">
                            <thead>
                                <th class="col-xs-3"></th>
                                <th class="col-xs-9"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>Programa en ESPAE</span>
                                    </td>
                                    <td>{{ $student->program->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Promoción en ESPAE</span>
                                    </td>
                                    <td>{{ $student->program_group }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Historia académica</span>
                                    </td>
                                    <td>
                                        @foreach($academic_history as $ah)
                                            @if(count($ah->academicLevel) > 0)
                                            - Nivel: {{ $ah->academicLevel->name }} <br>
                                            @endif
                                            - Título: {{ $ah->title }} <br>
                                            - Institución: {{ $ah->institution }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>Situación laboral</h4>
                        <table class="table table-striped student_detail_table">
                            <thead>
                                <th class="col-xs-3"></th>
                                <th class="col-xs-9"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>Situación laboral actual</span>
                                    </td>
                                    <td>
                                        @if(count($student->jobStatus) > 0)
                                        {{ $student->jobStatus->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                @if(count($working_history) > 0)
                                <tr>
                                    <td>
                                        <span>Sector empresarial</span>
                                    </td>
                                    <td>
                                        @if(count($working_history->businessArea) > 0)
                                        {{ $working_history->businessArea->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Compañía</span>
                                    </td>
                                    <td>
                                        @if(count($working_history->company) > 0)
                                        {{ $working_history->company }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                    </tr>
                                <tr>
                                    <td>
                                        <span>Posición laboral</span>
                                    </td>
                                    <td>
                                        @if(count($working_history->jobPosition) > 0)
                                        {{ $working_history->jobPosition->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Departamento funcional</span>
                                    </td>
                                    <td>
                                        @if(count($working_history->workingArea) > 0)
                                        {{ $working_history->workingArea->name }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Rango ingreso mensual</span>
                                    </td>
                                    <td>
                                        @if(count($working_history->monthlyIncome) > 0)
                                        {{ $working_history->monthlyIncome->income }}
                                        @else
                                        --
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <h4>Movilidad laboral y expectativa</h4>
                        <table class="table table-striped student_detail_table">
                            <thead>
                                <th class="col-xs-3"></th>
                                <th class="col-xs-9"></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>Tuvo ascenso laboral durante o después de programa en ESPAE?</span>
                                    </td>
                                    <td>
                                        @if($student->had_promotion_after_espae == "1")
                                        SI
                                        @elseif($student->had_promotion_after_espae == "2")
                                        NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Incremento salarial durante o después de programa en ESPAE?</span>
                                    </td>
                                    <td>
                                        @if($student->had_incomes_increase == "1")
                                        SI
                                        @elseif($student->had_incomes_increase == "2")
                                        NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Incremento de responsabilidades durante o después de ESPAE? </span>
                                    </td>
                                    <td>
                                        @if($student->had_responsabilities_increase == "1")
                                        SI
                                        @elseif($student->had_responsabilities_increase == "2")
                                        NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Su situación actual comparada a sus expectativas</span>
                                    </td>
                                    <td>
                                        @if($student->reality_vs_expectative == "1")
                                        Mejor de lo que me esperaba
                                        @elseif($student->reality_vs_expectative == "2")
                                        Igual a lo que me esperaba
                                        @elseif($student->reality_vs_expectative == "3")
                                        Peor de lo que me esperaba
                                        @elseif($student->reality_vs_expectative == "4")
                                        No tenía ninguna expectativa
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Nivel de pertenencia con ESPAE</span><br>0 (Bajo) - 5 (Muy alto)
                                    </td>
                                    <td>
                                        {{ $student->belong_level_espae }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Utilidad de conocimientos de ESPAE en el trabajo?</span>
                                        <br>0 (Nada útil) - 5 (Muy útil)
                                    </td>
                                    <td>
                                        {{ $student->work_knowledge_value }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Utilidad de conocimientos de ESPAE en la vida</span>
                                        <br>0 (Nada útil) - 5 (Muy útil)
                                    </td>
                                    <td>
                                        {{ $student->life_knowledge_value }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Nivel de satisfacción con ESPAE</span>
                                        <br>0 (Nada satisfecho) - 5 (Muy satisfecho)
                                    </td>
                                    <td>
                                        {{ $student->satisfaction_level_espae }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Recomendaría ESPAE?</span>
                                    </td>
                                    <td>
                                        @if($student->would_recomend_espae == "1")
                                        SI
                                        @elseif($student->would_recomend_espae == "2")
                                        NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Qué otros cursos desea tomar en ESPAE?</span>
                                    </td>
                                    <td>
                                        @if($student->other_programs_espae_in_future == "1")
                                        Cursos de actualización de conocimientos (Educación Ejecutiva)
                                        @elseif($student->other_programs_espae_in_future == "2")
                                        Otra maestría
                                        @elseif($student->other_programs_espae_in_future == "3")
                                        Ninguno
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Otro servicio como graduado?</span>
                                    </td>
                                    <td>
                                        @if($student->graduate_services_wish == "1")
                                        Acceso al directorio de graduados
                                        @elseif($student->graduate_services_wish == "2")
                                        Aplicación móvil para graduados
                                        @elseif($student->graduate_services_wish == "3")
                                        Carnet de graduados con beneficios
                                        @elseif($student->graduate_services_wish == "4")
                                        Encuentro laboral anual
                                        @elseif($student->graduate_services_wish == "5")
                                        Eventos de networking
                                        @elseif($student->graduate_services_wish == "6")
                                        Mentorías a alumnos o graduados
                                        @elseif($student->graduate_services_wish == "7")
                                        Ser conferencista en un evento de ESPAE
                                        @elseif($student->graduate_services_wish == "8")
                                        Oportunidad de recibir asesoría y orientación
                                        @elseif($student->graduate_services_wish == "9")
                                        Oportunidades profesionales / Bolsa de trabajo
                                        @elseif($student->graduate_services_wish == "10")
                                        Voluntariado para eventos
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Planea abrir compañía?</span>
                                    </td>
                                    <td>
                                        @if($student->planning_to_open_company == "1")
                                        SI
                                        @elseif($student->planning_to_open_company == "2")
                                        NO
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>En su opinión, principal obstáculo para crear compañía?</span>
                                    </td>
                                    <td>
                                        {{ $student->main_obstacle_create_company }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection