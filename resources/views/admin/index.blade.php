{{--
@extends('admin.master')
@section('title', 'الرئيسية | Admin')
@section('content')
  {{-- Page Heading --}}
{{-- <h1 class="h3 mb-4 text-gray-800" style="text-align: right; color: black">الصفحة الرئيسية/ اهلا بكم </h1>
<div class="row"> --}}

{{--  Earnings (Monthly) Card Example  --}}
{{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                          <div
                             class="text-s font-weight-bold text-info text-uppercase mb-3">الموظفين
                          </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $d_count }}</div>
                            </div>
                        </div>
                    </div>
                      <div class="col-auto">
                          <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Pending Requests Card Example -->
    <div  class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-s font-weight-bold text-warning text-uppercase mb-3">
                              المرضى</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $a_count }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div> --}}




@extends('admin.master')
@section('title', 'الرئيسية | Admin')
@section('content')
@section('styles')

    <style>
        * {
            box-sizing: border-box;
        }

        /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;

        } */

        /* .calendar {
            width: 100%;
            height: 100%;
            background-color: #925aec;
            box-shadow: 2px 5px 10px 5px #E8E8E8;
            border-radius: 20px;
            display: flex;
            overflow: hidden;

        }

        .calendar-picture {

            width: 340px;
            height: 550px;
            color: #fff;
            background: url(https://images.unsplash.com/photo-1607278843240-419b8d83672d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=60) no-repeat center / cover;


        } */

        h2 {
            color: #295571;
            font-family: 'Roboto', sans-serif;
            font-size: 30px;
            float: right;
            position: relative;
            right: 50px;
            top: 10px;

        }

        /* .calendar-date {

            color: rgb(118, 122, 235);
            display: flex;
            flex-wrap: wrap;
            padding-left: 35px;
            font-weight: bold;
            width: 100%;

        }

        .cal-day {
            width: calc(100% / 7);
            color: #4e49d6;
            font-size: 20px;
            text-align: center;
        }

        .cal-numbers {
            font-size: 20px;
            color: rgb(189, 16, 16);
            display: flex;
            flex-wrap: wrap;
            padding-left: 60px;

        }

        .cal-num {

            width: calc(100% / 7);
            padding: 30px;
            color: #3e3c3c;
            font-weight: inherit;
            font-size: 25px;
            text-align: center;
        }

        .cal8 {
            background-color: #4708ae;
            border-radius: 10px;
            color: rgb(247, 243, 243);

        } */

.fc-content { white-space: normal !important; padding: 7px}
.fc-day-grid-event { margin-bottom: 9px;  }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css">
@stop
<h1 class="h3 mb-4 text-gray-800" style="text-align: right; color: black">الصفحة الرئيسية/ اهلا بكم </h1>
<div class="row">
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    {{-- <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}
{{--
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center"> --}}
                    {{-- <div class="col mr-2">
                        <div class="text-s font-weight-bold text-info text-uppercase mb-3">الموظفين
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $d_count }}</div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}
</div>

<div class="container">
    <div class="row">
      <div id="calendar"></div>
    </div>
  </div>

{{-- <div class="calendar">
    <div class="calendar-picture"></div>
    <div class="cal-right">
        <h2>october 2022</h2>
        <div class="calendar-date">
            <div class="cal-day">SUN</div>
            <div class="cal-day">SAT</div>
            <div class="cal-day">MON</div>
            <div class="cal-day">TUE</div>
            <div class="cal-day">WED</div>
            <div class="cal-day">THU</div>
            <div class="cal-day">FRI</div>
        </div>
        <div class="cal-numbers">
            @for ($i = 1; $i <= Carbon\Carbon::now()->daysInMonth; $i++)
                @if ($i == Carbon\Carbon::now()->day)
                    <div class="cal-num cal8">
                        {{ $i }}
                        @foreach (\App\Models\Apponment::whereDay('date', $i)->get() as $item)
                            <br><small class="text-xs">{{ $item->patient->name }}</small>
                        @endforeach
                        <br>
                    </div>
                    @continue
                @endif
                <div class="cal-num">{{ $i }}</div>
            @endfor
        </div>
    </div>
</div> --}}
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.js"></script>
<script>
    $(document).ready(function() {

    var eventDataSourceURL = '/api/apponment';

    var calendarupdateInterval = 5000;  // RE-FETCH INTERVAL FOR GOOGLE CALENDAR DATA
    var calendarAddedtoPage = false;    // FLAG TO DETECT IF CALENDAR HAS PREVIOUSLY BEEN ADDED OR NEEDS TO BE ADDED
    var eventsArray = [];               // EMPTY ARRAY WE'LL USE TO HOLD OUR EVENTS


    // FUNCTION TO GET THE JSON DATA FROM GOOGLE CALENDAR API IN JSON FORMAT
    function getData() {
        eventsArray = [];   // EMPTY THE ARRAY EACH TIME WE START THIS OR WILL HAVE DUPLICATE EVENTS IN ARRAY
        $.getJSON(
            eventDataSourceURL,
            function(result) {

                // THE JSON DATA FROM GOOGLE IS NOT IN THE FORMAT THAT FULLCALENDAR NEEDS, SO WE'LL LOOP THROUGH AND BUILD OUR OWN ARRAY TO USE
                $.each(result.data, function(i, val) {
                    // IF THE STATUS IS CONFIRMED AND IT HAS A START DATE AND TIME... OTHERWISE WE MAY LACK DATA NEEDED TO ADD TO CALENDAR...
                    if (val.date) {
                        // WHEN WE ENCOUNTER AN EVENT WITH NO 'SUMMARY' TEXT (THE EVENT TITLE), WE NEED TO SET SOME TEXT SINCE THE CODE AND CALENDAR EXPECTS IT

                        // THEN WE ADD IT TO OUR EVENTS ARRAY...
                        eventsArray.push({
                            title: val.patient,  // THE TITLE ELEMENT OF THE ARRAY, REMOVING ANY QUOTES THOUGH...
                            start: val.date,   // THE DATE AND TIME FOR THE EVENT
                            backgroundColor: val.status == 'وصول' ? 'green' : 'red'
                        });
                    } else {
                        console.log("could not add due to lacking data ... event date/time or status not confirmed");
                    }
                });

               //TEST REMOVE THE 15TH ARRAY ITEM
               //if (calendarAddedtoPage == true){
               //    eventsArray.splice(15,1);
               //}


                // RUN OUR DRAW CALENDAR FUNCTION TO EITHER ADD THE CALENDAR AND POPULATE WITH DATA OR UPDATE THE CALENDAR WITH NEWLY ACQUIRED DATA...
                drawCalendar();


            }
        );
    }



    function drawCalendar() {
        // IF THE CALENDAR HAS NOT BEEN ALREADY ADDED TO THE PAGE...
        if (calendarAddedtoPage == false) {
            calendarAddedtoPage = true;
            // CALENDAR HAS NOT BEEN DRAWN ONCE SO WE ARE ADDING IT TO DOM
            console.log('Create NEW Calendar for dom ' + new Date())
            $("#calendar").fullCalendar({
                eventBackgroundColor: 'red',
                defaultView: "month", //Possible Values: month, basicWeek, basicDay, agendaWeek, agendaDay
                header: {
                    left: "title",
                    center: "",
                    //right: "today,prevYear,prev,next,nextYear" //Possible Values: month, basicWeek, basicDay, agendaWeek, agendaDay, today prevYear,prev,next,nextYear
                    right: 'agendaDay,agendaWeek,month,prev,next'
                },
                buttonIcons: {
                    prev: "left-single-arrow",
                    next: "right-single-arrow",
                    prevYear: "left-double-arrow",
                    nextYear: "right-double-arrow"
                }

            });
            $("#calendar").fullCalendar("removeEventSources" );     // JUST TO MAKE SURE NOTHINGS IN CALENDAR... PROBABLY OVERKIILL, BUT WHAT THE HELL...
            $("#calendar").fullCalendar("addEventSource", eventsArray); // ADD THE NEW ARRAY OF DATA TO THE CALENDAR

            // START A x SECOND LOOP WHERE WE RE-RUN THE GET DATA FUNCTION AND START IT ALL OVER AGAIN...
            setInterval(function(){
                getData()
            }, calendarupdateInterval)

        } else if (calendarAddedtoPage == true) {
            // CALENDAR HAS ALREADY BEEN DRAWN ONCE, SO JUST UPDATE THE DATA WITH NEW EVENTS ARRAY RETRIEVED...
            console.log('Updating calendar data - ' + new Date())

            $("#calendar").fullCalendar( 'removeEvents');  // JUST TO MAKE SURE NOTHINGS IN CALENDAR... PROBABLY OVERKIILL, BUT WHAT THE HELL...
            $("#calendar").fullCalendar( 'addEventSource', eventsArray ) // ADD THE NEW ARRAY OF DATA TO THE CALENDAR

        }


    }

    // START THINGS OFF AND GET THIS PARTY STARTED... BASICALLY CALLING THE FIRST FUNCTION THAT SETS IT INTO MOTION...
    getData();
});
</script>
@endsection
