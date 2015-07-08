<!DOCTYPE html>
<?php include "common/application_top.php"; ?>

<style type="text/css">
      html { 
        height: 100%;
      }
      body {
        height: 100%; 
        margin: 0; 
        padding: 0 ;
      }
      #map-canvas {
        height: 400px;
        width: 960px;
        position: relative;
        top:15px;
        margin:0 auto;
      } 
</style>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5PdIOPhItm3ko6N2qe8K4GIfI6F08l9w">
    </script>
    <script type="text/javascript">
    $( document ).ready(function() {
    ///////////Variables
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    ///////////Initialize map
    function initialize() {
      directionsDisplay = new google.maps.DirectionsRenderer();
      var startCenter = new google.maps.LatLng(51.5286416,-0.1015987);
      var mapOptions = {
        zoom:7,
        center: startCenter
      }
      map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
      directionsDisplay.setMap(map);
    }


    ////////////Draw route between 2 markers and calculate distance and duration of journey
    function calcRoute() {
      var start = '<?php echo $HTcode; ?>';
      var end = '<?php echo $ATcode; ?>';
      var request = {
                    origin:start,
                    destination:end,
                    travelMode: google.maps.TravelMode.DRIVING
                    };

      directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
          }
      });
    }

    /////////////Function calls
   $(document).ready(function(){
       initialize();
       calcRoute();
   });
//    google.maps.event.addDomListener(window, 'load', initialize);

});
    </script>
    <body>    
      <div class="contentWrap">
          <div id="map-canvas" />
      </div>
      <div class="contentMap">
    <form method="post" action="home/journeyProcess" class="form-signin" role="form">

<label class="label_width" style="color:white;">Cost of journey: (&pound;)</label><input type="number" disabled value="<?php echo number_format($price,2); ?>" name="TripCost" class="form-control" placeholder="TripCost" required />
<label class="label_width" style="color:white;">Price per person: (&pound;)</label><input type="number" value="<?php echo number_format(($price/$dataProvider['numberPeople']),2) ?>" name="PersonCost" class="form-control" placeholder="Cost per person" required />

</form>

          <form action="registerJourney" method="post">

              <input type="hidden" value="<?php echo $dataArray['user_id'];?>"  name="user_id"/>
              <input type="hidden" value="<?php echo $dataArray['postcode'];?>"  name="postcode"/>
              <input type="hidden" value="<?php echo $dataArray['address'];?>"  name="address"/>
              <input type="hidden" value="<?php echo $dataArray['leave_time'];?>"  name="leave_time"/>
              <input type="hidden" value="<?php echo $dataArray['arrive_time'];?>"  name="arrive_time"/>
              <input type="hidden" value="<?php echo $dataArray['team_id'];?>"  name="team_id"/>
              <input type="hidden" value="<?php echo $dataArray['fixture_id'];?>"  name="fixture_id"/>
              <input type="hidden" value="<?php echo $dataArray['desc'];?>"  name="desc"/>
              <input type="hidden" value="<?php echo $dataArray['From'];?>"  name="From"/>
              <input type="hidden" value="<?php echo $dataArray['to'];?>"  name="to"/>
              <input type="hidden" value="<?php echo $dataArray['duration'];?>"  name="duration"/>
              <input type="hidden" value="<?php echo $dataArray['distance'];?>"  name="distance"/>
              <input type="hidden" value="<?php echo $dataArray['people'];?>"  name="people"/>
              <input type="hidden" value="<?php echo $dataArray['totalCost'];?>"  name="totalCost"/>
              <input type="hidden" value="<?php echo $dataArray['returning'];?>"  name="returning"/>

              <button class="btn btn-lg btn-primary btn-block" style="width:30%;" name="submit" type="submit" id="postJourney">Offer Journey<button>
          </form>
      </div>
  
    </body>

<style>
    #postJourney{
        background-color: #da0040;
        color: #ffffff;
        width: 230px;
        font-size: 20px;
        border: 2px solid #ffffff;
    }
</style>
<script>

//    $('#postJourney').click(function(e){
//        e.preventDefault();
//    });

</script>
<?php include "common/application_bottom.php";?>
