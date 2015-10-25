@extends('dashboard')
@section('content')


<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Rezerwacja - ilość rezerwacji z ostatnich 30 dni</h3>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Rezerwacja:  1 Jan, 2014 - 30 Jan, 2014</strong>
                      </p>
                      <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="salesChart" style="height: 200px;"></canvas>
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    
a. liczba nowych rezerwacji, <br>
b. liczba rezerwacji anulowanych, <br> 
c .liczba rezerwacji niedokończonych <br>
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


@endsection