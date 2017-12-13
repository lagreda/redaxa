@extends('layout')

@section('title', 'Programas')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Programas</h2>
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
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="ex3">Nombre</label>
                                <input type="text" id="ex3" value="{{ $name }}" class="form-control" name="name" placeholder="Nombre">
                            </div>                            
                            <div class="form-group">
                                <label for="ex4">Tipo de programa</label>                                
                                <select class="form-control" name="program_type_id" id="ex4">
                                    <option value="">- TODO(A)S -</option>
                                    @foreach($program_types as $program_type)
                                    <option value="{{ $program_type->id }}"
                                    @if($program_type_id == $program_type->id) selected @endif
                                    >{{ $program_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                            <button type="button" class="btn btn-success" onclick="javascript: window.location = '{{ URL::to('program/create') }}'"><span class="fa fa-plus"></span> Agregar nuevo</button>
                        </form>
                    </div>

                    @if(session('ok'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        Transacción realizada con éxito <span class="fa fa-check"></span>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        Error al realizar la transacción <span class="fa fa-check"></span>
                    </div>
                    @endif

                    <div class="responsive-table">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>     
                            <th>Tipo de programa</th>                   
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programs as $program)
                            <tr>
                                <td>{{ $program->id }}</td>
                                <td>
                                    <a href="{{ URL::to('program/'.$program->id.'/edit') }}">{{ $program->name }}</a>
                                </td>
                                <td>{{ $program->programType->name }}</td>
                                <td>
                                <div class="">
                                    <input type="checkbox" class="js-switch" @if($program->status == "1") checked @endif
                                    onchange="updateStatus('{{ URL::to('program/'.$program->id.'/status/') }}', this)"/>
                                </div>
                                </td>
                                <td>
                                    <a href="{{ URL::to('program/'.$program->id.'/edit') }}"><span class="fa fa-edit"></span> Editar</a>
                                </td>
                                <td>                                    
                                    <form action="{{ URL::to('program/'.$program->id) }}" method="POST" id="df{{ $program->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a onclick="deleteElement('{{ $program->id }}')"><span class="fa fa-trash"></span> Eliminar</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    {{ $programs->setPath('')->appends(Request::except('page'))->links() }}
                                </td>
                                <td style="text-align: right;">
                                    {{ $programs->total() }} registro(s)
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
@endsection