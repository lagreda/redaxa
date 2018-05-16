<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ESPAE | Repositorio de Datos de Alumnos y Ex-alumnos (REDAXA)</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/externalform.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 logo-holder">
                    <img src="{{ asset('/img/espae-logo.jpg') }}" alt="ESPAE">
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h2>Repositorio de datos de<br> alumnos y ex-alumnos</h2>
                </div>
            </div>
        </div>
    </div>
    @if(count($student) > 0)
    <div class="container">
        <div class="navigator">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                            30%
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <button type="button" class="btn btn-info" disabled onclick="prev();"><span class="glyphicon glyphicon-chevron-left"></span> Anterior</button>
                    <button type="button" class="btn btn-success" onclick="next();">Siguiente <span class="glyphicon glyphicon-chevron-right"></span></button>
                    <button type="button" class="btn btn-primary" onclick="end();">FINALIZAR <span class="glyphicon glyphicon-ok"></span></button>
                </div>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible" role="alert" id="storeOk">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-ok-circle"></span>
            Guardado automático
          </div>
        <form action="" class="col-xs-12" id="extForm">
            {{ csrf_field() }}
            <input type="hidden" name="ext_token" value="{{ $ext_token }}">
            <input type="hidden" name="form_section" value="1" id="form_section">
            <div class="row form-panel" id="basic_data">
                <div class="row">
                    <h3 class="col-xs-12">Datos del graduado</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="legal_id">Identificación</label>
                        <input type="text" class="form-control" id="legal_id" name="legal_id" placeholder="Identificación" value="{{ $student->legal_id }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $student->name }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="surname">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Apellido" value="{{ $student->surname }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="main_email">Email personal</label>
                        <input type="text" class="form-control" id="main_email" name="main_email" placeholder="Email personal" value="{{ $student->main_email }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="personal_url">Sitio web</label>
                        <input type="text" class="form-control" id="personal_url" name="personal_url" placeholder="Sitio web" value="{{ $student->personal_url }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="mobile_number">Teléfono celular</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Teléfono celular" value="{{ $student->mobile_number }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="home_number">Teléfono convencional</label>
                        <input type="text" class="form-control" id="home_number" name="home_number" placeholder="Teléfono convencional" value="{{ $student->home_number }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="birth_date">Fecha de nacimiento</label>
                        <input type="text" class="form-control datepicker" id="birth_date" name="birth_date" readonly placeholder="Fecha de nacimiento" value="{{ $student->birth_date }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="home_address_1">Domicilio</label>
                        <input type="text" class="form-control" id="home_address_1" name="home_address_1" placeholder="Domicilio" value="{{ $student->home_address_1 }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="linkedin_url">URL LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="URL LinkedIn" value="{{ $student->linkedin_url }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="facebook_url">URL Facebook</label>
                        <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="URL Facebook" value="{{ $student->facebook_url }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="twitter_url">URL Twitter</label>
                        <input type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="URL Twitter" value="{{ $student->twitter_url }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="zip_code">Código postal</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Código postal" value="{{ $student->zip_code }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="country_id_birth">País de nacimiento</label>
                        <select name="country_id_birth" id="country_id_birth" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                            @if($country->id == $student->country_id_birth) selected @endif
                            >{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="ec_city_id_birth">Ciudad (Ecuador) de nacimiento</label>
                        <select name="ec_city_id_birth" id="ec_city_id_birth" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                            @if($city->id == $student->ec_city_id_birth) selected @endif
                            >{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="country_id_residence">País de residencia</label>
                        <select name="country_id_residence" id="country_id_residence" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                            @if($country->id == $student->country_id_residence) selected @endif
                            >{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="ec_city_id_residence">Ciudad (Ecuador) de residencia</label>
                        <select name="ec_city_id_residence" id="ec_city_id_residence" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                            @if($city->id == $student->ec_city_id_residence) selected @endif
                            >{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="civil_status_id">Estado civil</label>
                        <select name="civil_status_id" id="civil_status_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($civil_status as $civil_status_item)
                            <option value="{{ $civil_status_item->id }}"
                            @if($civil_status_item->id == $student->civil_status_id) selected @endif
                            >{{ $civil_status_item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="blood_type_id">Tipo de sangre</label>
                        <select name="blood_type_id" id="blood_type_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($blood_types as $blood_type)
                            <option value="{{ $blood_type->id }}"
                            @if($blood_type->id == $student->blood_type_id) selected @endif
                            >{{ $blood_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="gender_id">Género</label>
                        <select name="gender_id" id="gender_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($genders as $gender)
                            <option value="{{ $gender->id }}"
                            @if($gender->id == $student->gender_id) selected @endif
                            >{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="ethnic_group_id">Grupo étnico</label>
                        <select name="ethnic_group_id" id="ethnic_group_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($ethnic_groups as $ethnic_group)
                            <option value="{{ $ethnic_group->id }}"
                            @if($ethnic_group->id == $student->ethnic_group_id) selected @endif
                            >{{ $ethnic_group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row form-panel" id="education">
                <div class="row">
                    <h3 class="col-xs-12">Educación</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="program_id">Programa que cursó en ESPAE</label>
                        <select name="program_id" id="program_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($programs as $program)
                            <option value="{{ $program->id }}"
                            @if($program->id == $student->program_id) selected @endif
                            >{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="program_group">Promoción</label>
                        <input type="number" class="form-control" id="program_group" name="program_group" placeholder="Promoción" value="{{ $student->program_group }}">
                    </div>
                </div>
            </div>

            <div class="row form-panel" id="job_situation">
                <div class="row">
                    <h3 class="col-xs-12">Situación laboral</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="job_status_id">Situación laboral actual</label>
                        <select name="job_status_id" id="job_status_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($job_status as $job_status_item)
                            <option value="{{ $job_status_item->id }}"
                            @if($job_status_item->id == $student->job_status_id) selected @endif
                            >{{ $job_status_item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="business_area_id">Sector empresarial</label>
                        <select name="business_area_id" id="business_area_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($business_areas as $business_area)
                            <option value="{{ $business_area->id }}"
                            @if(count($work_history) > 0 && $business_area->id == $work_history->business_area_id) selected @endif
                            >{{ $business_area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="job_position">Posición laboral</label>
                        <select name="job_position" id="job_position" class="form-control">
                            <option value="">- SELECCIONE UNA -</option>
                            @foreach($job_positions as $job_position)
                            <option value="{{ $job_position->id }}"
                            @if(count($work_history) > 0 && $job_position->id == $work_history->job_position_id) selected @endif
                            >{{ $job_position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="working_area_id">Departamento funcional</label>
                        <select name="working_area_id" id="working_area_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($working_areas as $working_area)
                            <option value="{{ $working_area->id }}"
                            @if(count($work_history) > 0 && $working_area->id == $work_history->working_area_id) selected @endif
                            >{{ $working_area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="monthly_income_id">Rango ingreso mensual</label>
                        <select name="monthly_income_id" id="monthly_income_id" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($monthly_incomes as $monthly_income)
                            <option value="{{ $monthly_income->id }}"
                            @if(count($work_history) > 0 && $monthly_income->id == $work_history->monthly_income_id) selected @endif
                            >{{ $monthly_income->income }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="company">Compañía</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Compañía"
                        @if(count($work_history) > 0) value="{{ $work_history->company }}" @endif
                        />
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="text" class="form-control datepicker" id="start_date" name="start_date" readonly placeholder="Fecha de inicio"
                        @if(count($work_history) > 0) value="{{ $work_history->start_date }}" @endif
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="work_number">Teléfono compañía</label>
                        <input type="text" class="form-control" id="work_number" name="work_number" placeholder="URL Twitter" value="{{ $student->work_number }}">
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                </div>
            </div>

            <div class="row form-panel" id="mobility">
                <div class="row">
                    <h3 class="col-xs-12">Movilidad laboral y expectativa</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="had_promotion_after_espae">Tuvo ascenso laboral durante o después de programa en ESPAE?</label>
                        <select name="had_promotion_after_espae" id="had_promotion_after_espae" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1" @if($student->had_promotion_after_espae == '1') selected @endif>SI</option>
                            <option value="2" @if($student->had_promotion_after_espae == '2') selected @endif>NO</option>
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="had_incomes_increase">Incremento salarial durante o después de programa en ESPAE?</label>
                        <select name="had_incomes_increase" id="had_incomes_increase" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1" @if($student->had_incomes_increase == '1') selected @endif>SI</option>
                            <option value="2" @if($student->had_incomes_increase == '2') selected @endif>NO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="had_responsabilities_increase">Incremento de responsabilidades durante o después de ESPAE?</label>
                        <select name="had_responsabilities_increase" id="had_responsabilities_increase" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1" @if($student->had_responsabilities_increase == '1') selected @endif>SI</option>
                            <option value="2" @if($student->had_responsabilities_increase == '2') selected @endif>NO</option>
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="life_plan_after_espae">Planes de vida después de ESPAE?</label>
                        <select name="life_plan_after_espae" id="life_plan_after_espae" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1">SI</option>
                            <option value="2">NO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="reality_vs_expectative">Su situación actual comparada a sus expectativas</label>
                        <select name="reality_vs_expectative" id="reality_vs_expectative" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($real_vs_expect as $rvs_key => $rvs_value)
                            <option value="{{ $rvs_key }}"
                            @if($student->reality_vs_expectative == $rvs_key) selected @endif
                            >{{ $rvs_value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="belong_level_espae">Nivel de pertenencia con ESPAE?</label><br><br>
                        <span>Bajo&nbsp;&nbsp;</span>
                        <input class="rangeslider" name="belong_level_espae" data-slider-id='ex1Slider1' type="text" 
                        data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="{{ $student->belong_level_espae }}" value="{{ $student->belong_level_espae }}"/>
                        <span>&nbsp;&nbsp;Alto</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="work_knowledge_value">Utilidad de conocimientos de ESPAE en el trabajo?</label><br><br>
                        <span>Nada útil&nbsp;&nbsp;</span>
                        <input class="rangeslider" name="work_knowledge_value" data-slider-id='ex1Slider2' type="text" 
                        data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="{{ $student->work_knowledge_value }}" value="{{ $student->work_knowledge_value }}"/>
                        <span>&nbsp;&nbsp;Muy útil</span>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="life_knowledge_value">Utilidad de conocimientos de ESPAE en la vida</label><br><br>
                        <span>Nada útil&nbsp;&nbsp;</span>
                        <input class="rangeslider" name="life_knowledge_value" data-slider-id='ex1Slider3' type="text" 
                        data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="{{ $student->life_knowledge_value }}" value="{{ $student->life_knowledge_value }}"/>
                        <span>&nbsp;&nbsp;Muy útil</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="satisfaction_level_espae">Nivel de satisfacción con ESPAE</label><br><br>
                        <span>Nada satisfecho&nbsp;&nbsp;</span>
                        <input class="rangeslider" name="satisfaction_level_espae" data-slider-id='ex1Slider4' type="text" 
                        data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="{{ $student->satisfaction_level_espae }}" value="{{ $student->satisfaction_level_espae }}"/>
                        <span>&nbsp;&nbsp;Muy satisfecho</span>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="would_recomend_espae">Recomendaría ESPAE?</label>
                        <select name="would_recomend_espae" id="would_recomend_espae" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1" @if($student->would_recomend_espae == '1') selected @endif>SI</option>
                            <option value="2" @if($student->would_recomend_espae == '2') selected @endif>NO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="other_programs_espae_in_future">Qué otros cursos desea tomar en ESPAE?</label>
                        <select name="other_programs_espae_in_future" id="other_programs_espae_in_future" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($programs_af_espae as $pae_key => $pae_value)
                            <option value="{{ $pae_key }}"
                            @if($student->other_programs_espae_in_future == $pae_key) selected @endif
                            >{{ $pae_value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="graduate_services_wish">Otro servicio como graduado?</label>
                        <select name="graduate_services_wish" id="graduate_services_wish" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            @foreach($espae_graduate_services as $egs_key =>$egs_value)
                            <option value="{{ $egs_key }}" 
                            @if($student->graduate_services_wish == $egs_key) selected @endif
                            >{{ $egs_value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="planning_to_open_company">Planea abrir una compañía?</label>
                        <select name="planning_to_open_company" id="planning_to_open_company" class="form-control">
                            <option value="">- SELECCIONE UNO -</option>
                            <option value="1" @if($student->planning_to_open_company == '1') selected @endif>SI</option>
                            <option value="2" @if($student->planning_to_open_company == '2') selected @endif>NO</option>
                        </select>
                    </div>
                    <div class="hidden-xs col-sm-2"></div>
                    <div class="col-xs-12 col-sm-5 form-group">
                        <label for="main_obstacle_create_company">En su opinión, principal obstáculo para abrir una compañía?</label>
                        <input type="text" class="form-control" id="main_obstacle_create_company" name="main_obstacle_create_company" placeholder="Obstáculo" value="{{ $student->main_obstacle_create_company }}">
                    </div>
                </div>
            </div>
        </form>
        <div class="navigator">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                            30%
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <button type="button" class="btn btn-info" disabled onclick="prev();"><span class="glyphicon glyphicon-chevron-left"></span> Anterior</button>
                    <button type="button" class="btn btn-success" onclick="next();">Siguiente <span class="glyphicon glyphicon-chevron-right"></span></button>
                    <button type="button" class="btn btn-primary" onclick="end();">FINALIZAR <span class="glyphicon glyphicon-ok"></span></button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="no-student">
        <h2>Lo sentimos, dirección inválida</h2>
    </div>
    @endif
    <div class="footer">
        <div class="container">
            <div class="row">
                <p>ESPAE Graduate School of Management</p>
            </div>
        </div>
    </div>

    <script
        src="http://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/externalform.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>

    <script>
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
        });

        // With JQuery
        $(".rangeslider").slider({
            tooltip: 'always'
        });
    </script>
</body>
</html>