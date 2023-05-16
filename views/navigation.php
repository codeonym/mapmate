<section data-cap="navigation" class="navigation flx">
  <div class="grid cards py-2 ">
    <div class="card flx">
      <div class="box flx flx-c py-3 px-3">
        <h1>Morocco</h1>
        <h4><i class="fa fa-solid fa-hourglass-half"></i><?php echo (date_default_timezone_get()) ?></h3>
        <h4><i class="fa fa-solid fa-map-location-dot"></i> North Africa</h3>
        <h4><i class="fa fa-solid fa-calendar-days"></i> <?php echo (date("d-m-Y"))?></h3>
      </div>
      <div class="hour-container flx py-3 px-3">
        <div class="hour">
          <div class="hand sec-hand"></div>
          <div class="hand min-hand"></div>
          <div class="hand h-hand"></div>
        </div>
      </div>
    </div>
    <div class="card global-statistics px-1 py-1 grid">
      <div class="box population flx flx-c py-1 px-1">
        <h1></h1>
        <h3>Population</h3>
        
      </div>
      <div class="box total-countries flx flx-c py-1 px-1">
        <h1></h1>
        <h3>Total Countries</h3>
        
      </div>
      <div class="box total-timezones flx flx-c py-1 px-1">
        <h1></h1>
        <h3>total timezones</h3>
        
      </div>
      <div class="box flx flx-c py-1 px-1">
        <h1>100</h1>
        <h3>description</h3>
        
      </div>
    </div>
    <div class="card time-container py-1 pagination-container" data-type='time'>
      <h3 class="px-1 py-1">Time</h3>
      <div class="table scroll">
        <table border="0" cellspacing="0" class="px-1 py-1">
        <tr>
          <td>iso code</td>
          <td>Country</td>
          <td>timezone</td>
          <td>Time</td>
        </tr>
        
      </table>
      </div>
      <div class="pagination pagination-time flx" data-page="1">Show More</div>
    </div>
    <div class="card px-1 weather-container pagination-container py-1" data-type='weather'>
      <h3 class="px-1 py-1">Weather</h3>
      <div class="table scroll">
        <table border="0" cellspacing="0" class="px-1 py-1">
        <tbody>
          
        </tbody>
      </table>
      </div>
      <div class="pagination pagination-weather flx" data-page="1">Show More</div>
    </div>
  </div>
</section>