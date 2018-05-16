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
                    <h3>Buscar registros</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="entity-search-form">
                        <form class="form-inline" id="students-form">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" value="{{ $name }}" class="form-control" name="name" placeholder="Nombre" style="width: 220px;">
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido</label>
                                <input type="text" id="surname" value="{{ $surname }}" class="form-control" name="surname" placeholder="Apellido" style="width: 220px;">
                            </div>
                            <div class="form-group">
                                <label for="legal_id">Cédula</label>
                                <input type="text" id="legal_id" value="{{ $legal_id }}" class="form-control" name="legal_id" placeholder="Cédula" style="width: 220px;">
                            </div>
                            <div class="form-group">
                                <label for="ex4">Programa</label>                                
                                <select class="form-control" name="program_id" id="ex4" style="width: 200px;">
                                    <option value="">- TODO(A)S -</option>
                                    @foreach($programs as $program)
                                    <option value="{{ $program->id }}"
                                    @if($program_id == $program->id) selected @endif
                                    >{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ex6">Promoción</label>
                                <input type="text" id="ex6" value="{{ $program_group }}" class="form-control" name="program_group" placeholder="Promoción" style="width: 150px;">
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                            <button type="button" class="btn btn-success" onclick="submitExcelForm();">Exportar a Excel</button>
                        </form>
                    </div>

                    @if(session('ok'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Transacción realizada con éxito <span class="fa fa-check"></span>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Error al realizar la transacción <span class="fa fa-check"></span>
                    </div>
                    @endif

                    <div class="responsive-table">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Programa</th>
                            <th>Promoción</th>
                            <th>Detalles</th>
                            <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                <td>{{ $student->legal_id }}</td>
                                <td>{{ $student->name.' '.$student->surname }}</td>
                                @if(count($student->program))
                                    <td>{{ $student->program->name }}</td>
                                @endif
                                <td style="text-align: center;">{{ $student->program_group }}</td>
                                <td><a href="{{ URL::to('student/'.$student->id) }}">Detalles</a></td>
                                <td><a href="{{ URL::to('student/'.$student->id.'/edit') }}">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{ $students->setPath('')->appends(Request::except('page'))->links() }}
                                </td>
                                <td style="text-align: right;">
                                    {{ $students->total() }} registro(s)
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        function submitExcelForm() {
            var form = $("#students-form");
            form.attr('action', '{{ URL::to('excel-student') }}');
            form.submit();
        }
    </script>
@endsection