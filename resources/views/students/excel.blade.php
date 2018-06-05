<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table>
    <tr>
        <td colspan="3">
            <h2>Estudiantes</h2>
        </td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Programa</th>
            <th>Promoción</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Teléfono casa</th>
            <th>Teléfono trabajo</th>
            <th>Fecha de nacimiento</th>
            <th>Dirección de domicilio</th>
            <th>Planea abrir compañía</th>
            <th>Obstáculos para abrir compañía</th>
            <th>Ascenso después de ESPAE</th>
            <th>Incremento salarial después de ESPAE</th>
            <th>Incremento de responsabilidades después de ESPAE</th>
            <th>Realidad vs. expectativa laboral</th>
            <th>Nivel de pertenencia ESPAE</th>
            <th>Valor de conocimientos en trabajo</th>
            <th>Valor de conocimientos en vida</th>
            <th>Satisfacción con ESPAE</th>
            <th>Recomendaría ESPAE?</th>
            <th>País de nacimiento</th>
            <th>País de residencia</th>
            <th>Ciudad (Ecuador) de nacimiento</th>
            <th>Ciudad (Ecuador) de residencia</th>
            <th>Tipo de sangre</th>
            <th>Estado civil</th>
            <th>Género</th>
            <th>Grupo étnico</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->legal_id }}</td>
            <td>{{ $student->name." ".$student->surname }}</td>
            <td>{{ $student->program->name }}</td>
            <td>{{ $student->program_group }}</td>
            <td>{{ $student->main_email }}</td>
            <td>{{ $student->mobile_number }}</td>
            <td>{{ $student->home_number }}</td>
            <td>{{ $student->work_number }}</td>
            <td>{{ $student->birth_date }}</td>
            <td>{{ $student->home_address_1 }}</td>
            <td>
                @if($student->planning_to_ == '1')
                SI
                @elseif($student->would_recomend_espae == '2')
                NO
                @endif
            </td>
            <td>{{ $student->main_obstacle_create_company }}</td>
            <td>
                @if($student->had_promotion_after_espae == '1')
                SI
                @elseif($student->had_promotion_after_espae == '2')
                NO
                @endif
            </td>
            <td>
                @if($student->had_incomes_increase == '1')
                SI
                @elseif($student->had_incomes_increase == '2')
                NO
                @endif
            </td>
            <td>
                @if($student->had_responsabilities_increase == '1')
                SI
                @elseif($student->had_responsabilities_increase == '2')
                NO
                @endif
            </td>
            <td>
                @if($student->reality_vs_expectative == '1')
                Mejor de lo que me esperaba
                @elseif($student->reality_vs_expectative == '2')
                Igual a lo que me esperaba
                @elseif($student->reality_vs_expectative == '3')
                Peor de lo que me esperaba
                @elseif($student->reality_vs_expectative == '4')
                No tenía ninguna expectativa
                @endif
            </td>
            <td>{{ $student->belong_level_espae }}</td>
            <td>{{ $student->work_knowledge_value }}</td>
            <td>{{ $student->life_knowledge_value }}</td>
            <td>{{ $student->satisfaction_level_espae }}</td>
            <td>
                @if($student->would_recomend_espae == '1')
                SI
                @elseif($student->would_recomend_espae == '2')
                NO
                @endif
            </td>
            <td>
                @if(count($student->countryBirth) > 0)
                {{ $student->countryBirth->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->countryResidence) > 0)
                {{ $student->countryResidence->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->cityBirth) > 0)
                {{ $student->cityBirth->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->cityResidence) > 0)
                {{ $student->cityResidence->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->bloodType) > 0)
                {{ $student->bloodType->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->civilStatus) > 0)
                {{ $student->civilStatus->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->gender) > 0)
                {{ $student->gender->name }}
                @else
                --
                @endif
            </td>
            <td>
                @if(count($student->ethnicGroup) > 0)
                {{ $student->ethnicGroup->name }}
                @else
                --
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
