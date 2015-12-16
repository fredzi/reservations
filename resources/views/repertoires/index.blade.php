@extends('main')
@section('content')

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        @foreach($repertoires as $key=>$mov)
        
        <?php
        $wynik = $mov->time;
$timestamps = strtotime("$wynik") + 180*60;
                $times = date('"H:i:s"', $timestamps);
                echo $times;
                echo '<br>';
                echo $list[$key];
        ?>
        @endforeach

        ?>
        

@endsection

@section('head')
<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.print.css")}}" media="print">
@endsection

@section('js')
<!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset("/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/lang/pl.js"></script>
     <!-- Page specific script -->
    <script>
    
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'dzisiaj',
            month: 'miesiąc',
            week: 'tydzień',
            day: 'dzień'
          },
          //Random default events
          events: [
              @foreach($repertoires as $key=>$repertoire)
                <?php
                
                $str = "#";
                $randNum = rand(1, 15);
                switch ($randNum) {
                    case 1: $randNum = '4FC1E9';
                        break;
                    case 2: $randNum = '48CFAD';
                        break;
                    case 3: $randNum = '8CC152';
                        break;
                    case 4: $randNum = 'EC87C0';
                        break;
                    case 5: $randNum = 'ED5565';
                        break;
                    case 6: $randNum = 'FC6E51';
                        break;
                    case 7: $randNum = 'AAB2BD';
                        break;
                    case 8: $randNum = '03F9FF';
                        break;
                    case 9: $randNum = 'ff5591';
                        break;
                    case 10: $randNum = '55a5ff';
                        break;
                    case 11: $randNum = 'a377fb';
                        break;
                    case 12: $randNum = 'fb9877';
                        break;
                    case 13: $randNum = '77fbbc';
                        break;
                    case 14: $randNum = 'b177fb';
                        break;
                    case 15: $randNum = 'fbce77';
                        break;
                        

                }
                $str .= $randNum;
                if($repertoire->monday== 1)
                {
                  $mon = 1;
                }
                else
                {
                  $mon = 7;
                }
                if($repertoire->tuesday == '1')
                {
                    $tue = 2;
                    
                }
                else
                {
                    $tue = 7;
                }
                if($repertoire->wednesday == '1')
                {
                    $wed = 3;
                    
                }
                else
                {
                    $wed = 7;
                }
                if($repertoire->thursday == '1')
                {
                    $thu = 4;
                    
                }
                else
                {
                    $thu = 7;
                }
                if($repertoire->friday == '1')
                {
                    $fri = 5;
                    
                }
                else
                {
                    $fri = 7;
                }
                if($repertoire->saturday == '1')
                {
                    $sat = 6;
                    
                }
                else
                {
                    $sat = 7;
                }
                if($repertoire->sunday == '1')
                {
                    $sun = 0;
                    
                }
                else
                {
                    $sun = 7;
                }

                $wynik = $repertoire->time;
                $timestamps = strtotime("$wynik") + $list[$key]*60;
                $times = date('"H:i:s"', $timestamps);
                ?>
            {
              title: '{!!json_encode($repertoire->title)!!}',
              start: {!!json_encode($repertoire->time)!!},
              end: {!!$times!!},
              backgroundColor: <?php echo "'$str'"; ?>, //red
              borderColor: "#f56954", //red
              allDay: false,
              dow: [ {{$mon}},{{$tue}},{{$wed}},{{$thu}},{{$fri}},{{$sat}},{{$sun}}],
              ranges: [{ 
         
        start: moment({!!json_encode($repertoire->date_from )!!} ,'YYYY-MM-DD'), 
        end: moment({!!json_encode($repertoire->date_to)!!} ,'YYYY-MM-DD'),
    }],
            },
              @endforeach
          ],
          eventRender: function(event){
        return (event.ranges.filter(function(range){ // test event against all the ranges

        return (event.start.isBefore(range.end) &&
                event.end.isAfter(range.start));

              }).length)>0; //if it isn't in one of the ranges, don't render it (by returning false)
          },
          editable: false,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");
            
          

          }
        });
      });
    </script>
    
@endsection