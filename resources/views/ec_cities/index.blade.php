@extends('layout')

@section('title', 'Ciudades Ecuador')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Ciudades Ecuador</h2>
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
                                <label for="ex4">Provincia</label>
                                <select name="ec_province_id" class="form-control" id="ex4">
                                    <option value="">- TODAS -</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}"
                                        @if($ec_province_id == $province->id) selected @endif
                                        >{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>                         
                            <button type="submit" class="btn btn-default">Buscar</button>
                            <button type="button" class="btn btn-success" onclick="javascript: window.location = '{{ URL::to('ec-city/create') }}'"><span class="fa fa-plus"></span> Agregar nuevo</button>
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
                            <th>Provincia</th>                     
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>
                                    <a href="{{ URL::to('ec-city/'.$city->id.'/edit') }}">{{ $city->name }}</a>
                                </td>
                                <td>
                                    {{ $city->province->name }}
                                </td>
                                <td>
                                <div class="">
                                    <input type="checkbox" class="js-switch" @if($city->status == "1") checked @endif
                                    onchange="updateStatus('{{ URL::to('ec-city/'.$city->id.'/status/') }}', this)"/>
                                </div>
                                </td>
                                <td>
                                    <a href="{{ URL::to('ec-city/'.$city->id.'/edit') }}"><span class="fa fa-edit"></span> Editar</a>
                                </td>
                                <td>                                    
                                    <form action="{{ URL::to('ec-city/'.$city->id) }}" method="POST" id="df{{ $city->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a onclick="deleteElement('{{ $city->id }}')"><span class="fa fa-trash"></span> Eliminar</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">                                    
                                    {{ $cities->setPath('')->appends(Request::except('page'))->links() }}                                    
                                </td>
                                <td style="text-align: right;">
                                    {{ $cities->total() }} registro(s)
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