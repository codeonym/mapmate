<section data-cap="statistics" class="statistics">
        <div class="container flx flx-c py-1 px-1">
          <div class="searchbar search flx">
          <label class="flx" for="search-a-Country">
            <input class="search-country" type="text" placeholder="Search Country"name="" id="search-a-Country">
            <i class="fa fa-solid fa-magnifying-glass"></i>
          </label>
          <div class="results flx">
              <div class="container scroll">
              </div>
            </div>
        </div>
          <div class="boxes scroll grid ">
            <div class="box py-1 px-1 flx-c flx">
              <h1 id="country-zoom-name">
                <span class="outer" aria-hidden="true">
                  <span class="inner" ></span> 
                </span>  
              </h1>
              <img id="country-zoom-flag"  alt="" srcset="">
            </div>
            <div id="mapCountryContainer" class="box  flx py-1 px-1 flx-c">
              <div class="mapCountry" id="mapCountry"></div>
            </div>
            <div id="country-zoom-info" class="box py-1 px-1 flx-c">
              <ul class="details scroll">
                <li ><strong>Name:</strong> <span id="zoom-li-name"></span></li>
                <li ><strong>Capital:</strong> <span id="zoom-li-capital"></span></li>
                <li ><strong>Population:</strong> <span id="zoom-li-population"></span></li>
                <li ><strong>Region:</strong> <span id="zoom-li-region"></span></li>
                <li ><strong>Subregion:</strong> <span id="zoom-li-subregion"></span></li>
                <li ><strong>Timezones:</strong> <span id="zoom-li-timezones"></span></li>
                <li ><strong>Currencies:</strong> <span id="zoom-li-currencies"></span></li>
                <li ><strong>Languages:</strong> <span id="zoom-li-languages"></span></li>
                <li ><strong>ISO code:</strong> <span id="zoom-li-alpha2code"></span></li>
                <li ><strong>Calling Code:</strong> <span id="zoom-li-calling"></span></li>
  </ul>
            </div>
            <div class="box py-1 px-1 flx-c">
              <h3>Export Data</h3>
              <div class="buttons flx flx-c">
                <button data-type="PDF" class="export">
                PDF
              </button>
              <button data-type="CSV" class="export">
                CSV
              </button>
              <button data-type="JSON" class="export">
                JSON
              </button>
              </div>
            </div>
          </div>
        </div>
      </section>