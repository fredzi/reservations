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
        
        $('#calendar').fullCalendar({
          lang: 'pl',
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

            <?php for($i=0; $i<$all;$i++){ 
              $data_from = json_encode($movie_date_from[$i]);
              $df = date_parse_from_format("Y-m-d",$data_from);
              $data_to = json_encode($movie_date_to[$i]);
              $dt = date_parse_from_format("Y-m-d",$data_to);
              $hour = json_encode($time[$i]);
              $h = date_parse_from_format("H",$hour);
              $min = json_encode($time[$i]);
              $m = date_parse_from_format("ii",$min);

              $timestamps = strtotime($h['hour'].':'.$m['minute']) + json_encode($time_movie[$i])*60;
              $times = date('H:i', $timestamps);
              

              $hour_to = $times;
              $h_to = date_parse_from_format("H",$hour_to);
              $min_to = $times;
              $m_to = date_parse_from_format("ii",$min_to);

              if(json_encode($monday[$i])=="1")
              {
                $mon = 1;
              }
              else
              {
                $mon = 7;
              }
              if(json_encode($tuesday[$i])=="1")
              {
                $tue = 2;
              }
              else
              {
                $tue = 7;
              }
              if(json_encode($wednesday[$i])=="1")
              {
                $wed = 3;
              }
              else
              {
                $wed = 7;
              }
              if(json_encode($thursday[$i])=="1")
              {
                $thur = 4;
              }
              else
              {
                $thur = 7;
              }
              if(json_encode($friday[$i])=="1")
              {
                $fri = 5;
              }
              else
              {
                $fri = 7;
              }
              if(json_encode($saturday[$i])=="1")
              {
                $sat = 6;
              }
              else
              {
                $sat = 7;
              }
              if(json_encode($sunday[$i])=="1")
              {
                $sun = 0;
              }
              else
              {
                $sun = 7;
              }

              echo '{title: '.json_encode($movie_title[$i]).' , ';
              echo 'start: "'.$h["hour"].':'.$m["minute"].'"';
              echo ', end: "'.$h_to["hour"].':'.$m_to["minute"].'"';
              echo  ' , allDay: false, backgroundColor: "#00c0ef", borderColor: "#00c0ef", dow: ['.$mon.','.$tue.','.$wed.','.$thur.','.$fri.','.$sat.','.$sun.'],  ';
              echo "ranges: [{ 
         
        start: moment('".$df["year"]."-".($df["month"])."-".$df["day"]."' ,'YYYY-MM-DD'), 
        end: moment('".$dt["year"]."-".($dt["month"])."-".($dt["day"]+1)."' ,'YYYY-MM-DD'),
    }],";
              echo '},'; }?>
            

            
            
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