<!DOCTYPE html>
<html>
    <head>
        <title>Next 5 Races</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style type="text/css">
            .greyhounds {  color: #fff;
                        background-color: #269abc;
                        border-color: #1b6d85;
                    }
            .harness {  color: #fff;
                        background-color: #398439;
                        border-color: #255625;
                    }
            .thoroughbred {
                    color: #fff;
                    background-color: #204d74;
                    border-color: #122b40;
            }

        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js/moment.min.js')}}"></script>
        <script type="text/javascript">
        $( document ).ready(function() {
            function createCounter(id){
                
                console.log(document.getElementById('race-' + id));

                var span = document.createElement('span');
                var objTo = document.getElementById('race-' + id);
                span.className = "pull-right";
                span.id = "spanrace-" + id;
                objTo.appendChild(span);
            }

            var race = {!!json_encode($race)!!}
            //races.forEach(function(race) {
                createCounter(race['id'])
                
                var myCounter = setInterval(function(){ startCounter(race['id'], race['closing_time']) }, 1000);
            //});

            //var myVar = setInterval(function(){ startCounter() }, 1000);

            function startCounter(id, dateclose) {
                var diffTime = moment(dateclose).diff(moment());
                var objTo = $('#spanrace-' + id);
                if (diffTime > 0){
                    var duration = moment.duration(diffTime);
                    var years = duration.years(),
                        days = duration.days(),
                        hrs = duration.hours(),
                      mins = duration.minutes(),
                      secs = duration.seconds();

                    
                    objTo.text(hrs + ' hrs ' + mins + ' mins ' + secs + ' sec');
                }
            }
        });
        </script>
        
    </head>
    <body>
        <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="page-header">
                <h1>Ladbrokes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Racing Detail</h3>
                </div>
                <div class="list-group">
                    <?php if (isset($race)): ?>
                            <div id="parentdiv-{{$race->id}}" class="list-group-item">
                                <p>Location {{ $race->location }}, Race {{ $race->race}} </p>
                                <p id="race-{{$race->id}}">
                                    <button type="button" class="btn btn-sm {{strtolower($race->type)}}">{{ $race->type }}</button>
                                </p>
                                <p>Desc: {{ $race->desciption }}</p>
                                <p>Competitors: 
                                    <div class="list-group">
                                        <?php if (isset($racecomps)): ?>
                                            <?php foreach ($racecomps as $racecomp): ?>
                                                <div id="compparentdiv-{{$racecomp->id}}" class="list-group-item">
                                                    <p>Name: {{ $racecomp->name }} </p>
                                                    <p>Position: {{ $racecomp->position }} </p>
                                                    <p>Desc: {{ $race->desciption }}</p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </p>
                            </div>
                    <?php endif; ?>
                </div>
              </div>
            </div><!-- /.col-sm-4 -->
        </div>
    </div>
    </body>
</html>
