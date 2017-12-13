@extends('layout')

@section('title', 'Ingresos mensuales')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Ingresos mensuales</h2>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Agregar registro</h3>                
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
                    <form action="{{ URL::to('monthly-income') }}" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="income">Ingreso <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="income" name="income" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit">Guardar</button>
						  <button class="btn btn-danger" type="button" onclick="exitForm('{{ URL::to('monthly-income') }}')">Cancelar</button>                          
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