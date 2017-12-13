@extends('layout')

@section('title', 'Áreas de negocio')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Áreas de negocio</h2>
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
                            <button type="button" class="btn btn-success" onclick="javascript: window.location = '{{ URL::to('business-area/create') }}'"><span class="fa fa-plus"></span> Agregar nuevo</button>                            
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
                            @foreach($business_areas as $business_area)
                            <tr>
                                <td>{{ $business_area->id }}</td>
                                <td>
                                    <a href="{{ URL::to('business-area/'.$business_area->id.'/edit') }}">{{ $business_area->name }}</a>
                                </td>
                                <td>
                                <div class="">
                                    <input type="checkbox" class="js-switch" @if($business_area->status == "1") checked @endif
                                    onchange="updateStatus('{{ URL::to('business-area/'.$business_area->id.'/status/') }}', this)"/>
                                </div>
                                </td>
                                <td>
                                    <a href="{{ URL::to('business-area/'.$business_area->id.'/edit') }}"><span class="fa fa-edit"></span> Editar</a>
                                </td>
                                <td>                                    
                                    <form action="{{ URL::to('business-area/'.$business_area->id) }}" method="POST" id="df{{ $business_area->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a onclick="deleteElement('{{ $business_area->id }}')"><span class="fa fa-trash"></span> Eliminar</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">                                    
                                    {{ $business_areas->setPath('')->appends(Request::except('page'))->links() }}                                    
                                </td>
                                <td style="text-align: right;">
                                    {{ $business_areas->total() }} registro(s)
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