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
                    <h3>Editar registro</h3>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="crud-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ URL::to('student/'.$student->id) }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <h4 class="eul">Datos básicos</h4>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="legal_id">Cédula <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="legal_id" name="legal_id" value="{{ $student->legal_id }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" value="{{ $student->name }}" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Apellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="surname" name="surname" value="{{ $student->surname }}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_email">Correo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="main_email" name="main_email" value="{{ $student->main_email }}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile_number">Celular
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="mobile_number" name="mobile_number" value="{{ $student->mobile_number }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_number">Número de casa
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="home_number" name="home_number" value="{{ $student->home_number }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="work_number">Número de trabajo 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="work_number" name="work_number" value="{{ $student->work_number }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birth_date">Fecha de nacimiento 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="birth_date" name="birth_date" value="{{ $student->birth_date }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_address_1">Código postal
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="home_address_1" name="home_address_1" value="{{ $student->home_address_1 }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip_code">Dirección de domicilio
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="zip_code" name="zip_code" value="{{ $student->zip_code }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_url">URL LinkedIn
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="linkedin_url" name="linkedin_url" value="{{ $student->linkedin_url }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url">URL Facebook 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="facebook_url" name="facebook_url" value="{{ $student->facebook_url }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url">URL Twitter
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="twitter_url" name="twitter_url" value="{{ $student->twitter_url }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id_birth">País de nacimiento
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="country_id_birth" id="country_id_birth" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}"
                                    @if($student->country_id_birth == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ec_city_id_birth">Ciudad (Ecuador) de nacimiento
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ec_city_id_birth" id="ec_city_id_birth" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                    @if($student->ec_city_id_birth == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id_residence">País de residencia
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="country_id_residence" id="country_id_residence" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}"
                                    @if($student->country_id_residence == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ec_city_id_residence">Ciudad (Ecuador) de residencia
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ec_city_id_residence" id="ec_city_id_residence" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                    @if($student->ec_city_id_residence == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="civil_status_id">Estado civil
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="civil_status_id" id="civil_status_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($civil_status as $cs)
                                    <option value="{{ $cs->id }}"
                                    @if($student->civil_status_id == $cs->id) selected @endif>{{ $cs->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blood_type_id">Tipo de sangre
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="blood_type_id" id="blood_type_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($blood_types as $blood_type)
                                    <option value="{{ $blood_type->id }}"
                                    @if($student->blood_type_id == $blood_type->id) selected @endif>{{ $blood_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender_id">Género
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="gender_id" id="gender_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}"
                                    @if($student->gender_id == $gender->id) selected @endif>{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ethnic_group_id">Grupo étnico
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="ethnic_group_id" id="ethnic_group_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($ethnic_groups as $ethnic_group)
                                    <option value="{{ $ethnic_group->id }}"
                                    @if($student->ethnic_group_id == $ethnic_group->id) selected @endif>{{ $ethnic_group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="graduated_from_espae">Graduado <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="graduated_from_espae" id="graduated_from_espae" class="form-control" required="required">
                                    <option value="1" @if($student->graduated_from_espae == '1') selected @endif >SI</option>
                                    <option value="0" @if($student->graduated_from_espae == '0') selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="starred">Destacado <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="starred" id="starred" class="form-control" required="required">
                                    <option value="1" @if($student->starred == '1') selected @endif >SI</option>
                                    <option value="0" @if($student->starred == '0') selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comments">Comentarios <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="comments" id="comments" class="form-control">
                                    {{ $student->comments }}
                                </textarea>
                            </div>
                        </div>

                        <h4 class="eul">Educación</h4>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="program_id">Programa en ESPAE<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="program_id" id="program_id" class="form-control" required="required">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($programs as $program)
                                    <option value="{{ $program->id }}"
                                    @if($student->program_id == $program->id) selected @endif>{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="program_group">Promoción en ESPAE <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="program_group" name="program_group" value="{{ $student->program_group }}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        @if(count($work_history) > 0)

                        <h4 class="eul">Situación laboral</h4>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_status_id">Situación laboral
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="job_status_id" id="job_status_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($job_status as $js)
                                    <option value="{{ $js->id }}"
                                    @if($student->job_status_id == $js->id) selected @endif>{{ $js->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="business_area_id">Sector empresarial
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="business_area_id" id="business_area_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($business_areas as $business_area)
                                    <option value="{{ $business_area->id }}"
                                    @if($work_history->business_area_id == $business_area->id) selected @endif>{{ $business_area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company">Compañía
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="company" name="company" value="{{ $work_history->company }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_position_id">Posición laboral
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="job_position_id" id="job_position_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($job_positions as $job_position)
                                    <option value="{{ $job_position->id }}"
                                    @if($work_history->job_position_id == $job_position->id) selected @endif>{{ $job_position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="working_area_id">Departamento funcional
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="working_area_id" id="working_area_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($working_areas as $working_area)
                                    <option value="{{ $working_area->id }}"
                                    @if($work_history->working_area_id == $working_area->id) selected @endif>{{ $working_area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monthly_income_id">Rango de ingreso mensual
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="monthly_income_id" id="monthly_income_id" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($monthly_incomes as $monthly_income)
                                    <option value="{{ $monthly_income->id }}"
                                    @if($work_history->monthly_income_id == $monthly_income->id) selected @endif>{{ $monthly_income->income }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @endif

                        <h4 class="eul">Mobilidad laboral y expectativas</h4>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="had_promotion_after_espae">Tuvo ascenso laboral durante o después de programa en ESPAE?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="had_promotion_after_espae" id="had_promotion_after_espae" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="1" @if($student->had_promotion_after_espae == "1") selected @endif>SI</option>
                                    <option value="2" @if($student->had_promotion_after_espae == "2") selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="had_incomes_increase">Incremento salarial durante o después de programa en ESPAE?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="had_incomes_increase" id="had_incomes_increase" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="1" @if($student->had_incomes_increase == "1") selected @endif>SI</option>
                                    <option value="2" @if($student->had_incomes_increase == "2") selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="had_responsabilities_increase">Incremento de responsabilidades durante o después de ESPAE?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="had_responsabilities_increase" id="had_responsabilities_increase" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="1" @if($student->had_responsabilities_increase == "1") selected @endif>SI</option>
                                    <option value="2" @if($student->had_responsabilities_increase == "2") selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reality_vs_expectative">Su situación actual comparada a sus expectativas
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="reality_vs_expectative" id="reality_vs_expectative" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($real_vs_expect as $rvs_key => $rvs_value)
                                    <option value="{{ $rvs_key }}"
                                    @if($student->reality_vs_expectative == $rvs_key) selected @endif
                                    >{{ $rvs_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="belong_level_espae">Nivel de pertenencia con ESPAE
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="belong_level_espae" id="belong_level_espae" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="0" @if($student->belong_level_espae == "0") selected @endif>0 - Bajo</option>
                                    <option value="1" @if($student->belong_level_espae == "1") selected @endif>1</option>
                                    <option value="2" @if($student->belong_level_espae == "2") selected @endif>2</option>
                                    <option value="3" @if($student->belong_level_espae == "3") selected @endif>3</option>
                                    <option value="4" @if($student->belong_level_espae == "4") selected @endif>4</option>
                                    <option value="5" @if($student->belong_level_espae == "5") selected @endif>5 - Muy alto</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="work_knowledge_value">Utilidad de conocimientos de ESPAE en el trabajo
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="work_knowledge_value" id="work_knowledge_value" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="0" @if($student->work_knowledge_value == "0") selected @endif>0 - Nada útil</option>
                                    <option value="1" @if($student->work_knowledge_value == "1") selected @endif>1</option>
                                    <option value="2" @if($student->work_knowledge_value == "2") selected @endif>2</option>
                                    <option value="3" @if($student->work_knowledge_value == "3") selected @endif>3</option>
                                    <option value="4" @if($student->work_knowledge_value == "4") selected @endif>4</option>
                                    <option value="5" @if($student->work_knowledge_value == "5") selected @endif>5 - Muy útil</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="life_knowledge_value">Utilidad de conocimientos de ESPAE en la vida
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="life_knowledge_value" id="life_knowledge_value" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="0" @if($student->life_knowledge_value == "0") selected @endif>0 - Nada útil</option>
                                    <option value="1" @if($student->life_knowledge_value == "1") selected @endif>1</option>
                                    <option value="2" @if($student->life_knowledge_value == "2") selected @endif>2</option>
                                    <option value="3" @if($student->life_knowledge_value == "3") selected @endif>3</option>
                                    <option value="4" @if($student->life_knowledge_value == "4") selected @endif>4</option>
                                    <option value="5" @if($student->life_knowledge_value == "5") selected @endif>5 - Muy útil</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="satisfaction_level_espae">Nivel de satisfacción con ESPAE
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="satisfaction_level_espae" id="satisfaction_level_espae" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="0" @if($student->satisfaction_level_espae == "0") selected @endif>0 - Nada satisfecho</option>
                                    <option value="1" @if($student->satisfaction_level_espae == "1") selected @endif>1</option>
                                    <option value="2" @if($student->satisfaction_level_espae == "2") selected @endif>2</option>
                                    <option value="3" @if($student->satisfaction_level_espae == "3") selected @endif>3</option>
                                    <option value="4" @if($student->satisfaction_level_espae == "4") selected @endif>4</option>
                                    <option value="5" @if($student->satisfaction_level_espae == "5") selected @endif>5 - Muy satisfecho</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="would_recomend_espae">Recomendaría ESPAE?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="would_recomend_espae" id="would_recomend_espae" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="1" @if($student->would_recomend_espae == "1") selected @endif>SI</option>
                                    <option value="2" @if($student->would_recomend_espae == "2") selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_programs_espae_in_future">Qué otros cursos desea tomar en ESPAE?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="other_programs_espae_in_future" id="other_programs_espae_in_future" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($programs_af_espae as $pae_key => $pae_value)
                                    <option value="{{ $pae_key }}"
                                    @if($student->other_programs_espae_in_future == $pae_key) selected @endif
                                    >{{ $pae_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="graduate_services_wish">Otro servicio como graduado?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="graduate_services_wish" id="graduate_services_wish" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    @foreach($espae_graduate_services as $egs_key =>$egs_value)
                                    <option value="{{ $egs_key }}" 
                                    @if($student->graduate_services_wish == $egs_key) selected @endif
                                    >{{ $egs_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="planning_to_open_company">Planea abrir compañía?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="planning_to_open_company" id="planning_to_open_company" class="form-control">
                                    <option value="">- Seleccionar uno(a) -</option>
                                    <option value="1" @if($student->planning_to_open_company == "1") selected @endif>SI</option>
                                    <option value="2" @if($student->planning_to_open_company == "2") selected @endif>NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="main_obstacle_create_company">En su opinión, principal obstáculo para crear compañía?
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="main_obstacle_create_company" name="main_obstacle_create_company" value="{{ $student->main_obstacle_create_company }}" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit">Guardar</button>
						  <button class="btn btn-danger" type="button" onclick="exitForm('{{ URL::to('student') }}')">Cancelar</button>                          
                        </div>
                      </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection