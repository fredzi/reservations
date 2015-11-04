@extends('main')
@section('content')


                    <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Numer rezerwacji: <?= $reservations->id; ?>
                <small class="pull-right">Data: <?= $reservations->date_end?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong><?= $reservations->customer_first_name; ?> <?= $reservations->customer_last_name; ?></strong><br>
                
                tel: <?= $reservations->customer_phone; ?><br>
                email: <?= $reservations->customer_email; ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong>{{Auth::user()->name}}</strong><br>
                
                {{Auth::user()->street.' '.Auth::user()->postcode}}<br>
                {{Auth::user()->city}}<br>
                Phone: (555) 539-1037<br>
                Email: {{Auth::user()->email}}<br>
                {{Auth::user()->www}}
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Nr faktury: #007612</b><br>
              
              
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nr</th>
                    <th>Typ klienta</th>
                    <th>Serial #</th>
                    <th>Film</th>
                    <th>Cena</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  	
                    <td>1</td>
                    <td>Normalny</td>
                 	
                    <td>455-981-221</td>
                    <td>Avatar</td>
                    <td>$64.50</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Ulgowy</td>
                    <td>247-925-726</td>
                    <td>Avatar</td>
                    <td>$50.00</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Normalny</td>
                    <td>735-845-642</td>
                    <td>Avatar</td>
                    <td>$64.50</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Normalny</td>
                    <td>422-568-642</td>
                    <td>Avatar</td>
                    <td>$64.50</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Metoda płatności:</p>
              <img src="{{ asset ("/bower_components/AdminLTE/dist/img/credit/visa.png")}}" alt="Visa">
              <img src="{{ asset ("/bower_components/AdminLTE/dist/img/credit/mastercard.png")}}" alt="Mastercard">
              <img src="{{ asset ("/bower_components/AdminLTE/dist/img/credit/american-express.png")}}" alt="American Express">
              <img src="{{ asset ("/bower_components/AdminLTE/dist/img/credit/paypal2.png")}}" alt="Paypal">
              
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead"><?= $reservations->date_end?></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Cena za bilety:</th>
                    <td><?= $reservations->summary; ?></td>
                  </tr>
                  <tr>
                    <th>Podatek (9.3%)</th>
                    <td>0 zł</td>
                  </tr>
                  <tr>
                    <th>Cena za całość:</th>
                    <td>0 zł</td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
@endsection