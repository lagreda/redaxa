@extends('layout')

@section('title', 'Grupos étnicos')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Grupos étnicos</h2>
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
                            <button type="submit" class="btn btn-default">Buscar</button>
                            <button type="button" class="btn btn-success" onclick="javascript: window.location = '{{ URL::to('ethnic-group/create') }}'"><span class="fa fa-plus"></span> Agregar nuevo</button>
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
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ethnic_groups as $ethnic_group)
                            <tr>
                                <td>{{ $ethnic_group->id }}</td>
                                <td>
                                    <a href="{{ URL::to('ethnic-group/'.$ethnic_group->id.'/edit') }}">{{ $ethnic_group->name }}</a>
                                </td>
                                <td>
                                <div class="">
                                    <input type="checkbox" class="js-switch" @if($ethnic_group->status == "1") checked @endif
                                    onchange="updateStatus('{{ URL::to('ethnic-group/'.$ethnic_group->id.'/status/') }}', this)"/>
                                </div>
                                </td>
                                <td>
                                    <a href="{{ URL::to('ethnic-group/'.$ethnic_group->id.'/edit') }}"><span class="fa fa-edit"></span> Editar</a>
                                </td>
                                <td>                                    
                                    <form action="{{ URL::to('ethnic-group/'.$ethnic_group->id) }}" method="POST" id="df{{ $ethnic_group->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a onclick="deleteElement('{{ $ethnic_group->id }}')"><span class="fa fa-trash"></span> Eliminar</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">                                    
                                    {{ $ethnic_groups->setPath('')->appends(Request::except('page'))->links() }}                                    
                                </td>
                                <td style="text-align: right;">
                                    {{ $ethnic_groups->total() }} registro(s)
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