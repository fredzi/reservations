@extends('main')







<!-- FORMULARZ DODAWANIA Rezerwacji -->
@section('content')
<div id="row">
	<div id="col-sm-4">
<form method="POST" action="{{ action('ReservationsController@store') }}" class="form-group">
{!! csrf_field() !!}
Nr repertuaru: <input type="text" name="repertoire_id" value="{{ old('repertoire_id')}}" class="form-control"><br>
Cena rezerwacji:<input type="text" name="summary" value="{{ old('summary')}}" class="form-control"><br>
<!-- Data rozpoczęcia wybierania miejsc: --><input type="hidden" name="date_start" value="{{ old('date_start',date('Y-m-d'))}}" class="form-control">
<!-- Data zakończenia wybierania miejsc: --><input type="hidden" name="date_end" value="{{ old('date_end',date('Y-m-d'))}}" class="form-control">
Imię:<input type="text" name="customer_first_name" value="{{ old('customer_first_name')}}" class="form-control"><br>
Nazwisko:<input type="text" name="customer_last_name" value="{{ old('customer_last_name')}}" class="form-control"><br>
Email:<input type="text" name="customer_email" value="{{ old('customer_email')}}" class="form-control"><br>
Telefon:<input type="text" name="customer_phone" value="{{ old('customer_phone')}}" class="form-control"><br>
Status rezerwacji:<input type="text" name="status" value="{{ old('status')}}" class="form-control"><br>
<input type="submit" value="Dodaj" class="btn btn-success">

</form>

</div>
<br>
</div>
@endsection