@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
{{ HTML::style('jplot/jquery.jqplot.css') }}
{{ HTML::script('jplot/jquery.jqplot.min.js') }}
{{ HTML::script('jplot/plugins/jqplot.pieRenderer.min.js') }}
{{ HTML::script('jplot/plugins/jqplot.donutRenderer.min.js') }}
<script type="text/javascript">
    
$(document).ready(function(){
  var data = [
    ['Employed', 9], ['UnEmployed', 14]
   
  ];
  var plot1 = jQuery.jqplot ('chart1', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );


  
 
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var s1 = [200, 600, 700, 1000];
    var s2 = [460, -210, 690, 820];
    var s3 = [-260, -440, 320, 200];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = ['May', 'June', 'July', 'August'];
     
    var plot1 = $.jqplot('chart2', [s1, s2, s3], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true}
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
            {label:'Hotel'},
            {label:'Event Regristration'},
            {label:'Airfare'}
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: {formatString: '$%d'}
            }
        }
    });
});
</script>
<div class="container">
    {{ Notification::showAll() }}
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#settings" data-toggle="tab">Statistics</a></li>
        <li><a href="#info" data-toggle="tab">Info</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="settings">
            <br>
            <h4><i class="glyphicon glyphicon-signal"></i> Statistics</h4>

            <div id="chart1">

            </div>
    </div>

            
            
          
        <div class="tab-pane" id="info">
            <br>
            <h4><i class="glyphicon glyphicon-info-sign"></i>Graduates</h4>
            <br>
               <div id="chart2">

               </div>
        </div>
    </div>
</div>
@stop