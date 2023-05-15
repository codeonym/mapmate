// GLOBAL DECLARATION

// GLOBAL CONSTS
const dashboardCloser = document.querySelector(".closer");

const worldmapCountries = document.querySelectorAll("#svgbg path");

const tootip = document.querySelector(".tooltip");

const sections = document.querySelectorAll(".content section");
const dashboardLinks = document.querySelectorAll(".dashboard ul.links li:not(.logout)");

const modeSwitch = document.querySelector(".mode");

const profileChevron = document.querySelector(".content header .profile .chevron");
const profileExpand = document.querySelector(".content header .profile .expand");

const loginBtn = document.querySelector(".login-btn");
const loginBtnClose = document.querySelector(".login-btn-close");
const loginModal = document.querySelector(".login-modal");

const alterBtnClose = document.querySelector(".alter-btn-close");
const alterModal = document.querySelector(".alter-modal");

const settingsLinks = document.querySelectorAll(".settings .rows .links li");
const settingsSections = document.querySelectorAll(".settings .rows .confs .section");

const searchCountryBars = document.querySelectorAll(".search-country");

const countriesTable = document.querySelector(".countries .container table tbody");
const countriesTotal = document.querySelector(".countries .head .options");

const navigationGobalStats = document.querySelector(".navigation .global-statistics");
const navigationTime = document.querySelector(".navigation .time-container table tbody");
const navigationWeather = document.querySelector(".navigation .weather-container");

const searchInput = document.querySelector("#searchCountry");
const sortSelect = document.querySelector(".sortby");


// GLOBAL VARS
let countriesData = [];

const apiKeyTimeZoneDb = 'EVJBG8P17IUE'; // Replace with your API key from TimezoneDB


// FUNCTIONS
// ======================== AJAX BLOCK =====================
function fetchData() {
  $.ajax({
    url: "/MAPMATE/php/fetchdata.php",
    method: "POST",
    dataType: "json",
    success: function (data) {
      countriesData = data;
      updateUI();
    },
    error: function(xhr, status, error) {
      console.log("An error occurred: " + error);
    }
  });
}



// ================= END AJAX BLOCK ========================

// UPDATE UI 
function updateUI() {
  updateCountries(countriesData["countries"], countriesData["totalPays"]);
  updateNavigation(countriesData, 1, 5);
}

// NAVIGATION FUNCTION
function navigate(links,elements) {
  links.forEach((link) => {
    link.addEventListener("click", (e) => {
      console.log(link.dataset.cap);
      elements.forEach((entry) => {
        if (entry.dataset.cap === link.dataset.cap) {
          entry.classList.add("open");
          links.forEach((link) => {
            link.classList.remove("selected");
          });
          link.classList.add("selected");
        } else {
          entry.classList.remove("open");
        }
      });
    })
  });
}
function zoomCountry(iso, openSection = false) {
  if (openSection == true) {
    document.getElementById("zoom-country").click();
  }
}
// UPDATE COUNTRIES SECTION 
function updateCountries(countries, totalCountries) {

  let tableRows = `
    <tr>
      <td>Flag</td>
      <td>Country</td>
      <td>ISO code</td>
      <td>Code</td>
      <td>Population</td>
      <td>Capital</td>
      <td></td>
    </tr>
  `;

  for (const country of countries) {
    tableRows += `
      <tr>
        <td><img src="./assets/flags/${country.alpha2}.svg" alt=""></td>
        <td>${country.nom_en_gb}</td>
        <td>${country.alpha2} - ${country.alpha3}</td>
        <td>${country.code}</td>
        <td>${country.population ?? "not specified"}</td>
        <td>${country.capitale ?? "not specified"}</td>
        <td>
          <i data-contry="${country.alpha2}" class="fa alter-btn fa-solid fa-ellipsis"></i>
        </td>
      </tr>
    `;
  }

  countriesTotal.innerText = `All (${totalCountries} countries)`;
  countriesTable.innerHTML = tableRows;

}
  // UPDATE NAVIGATION SECTION
function updateNavigation(data, currentPage = 1, itemsPerPage = 10) {

  // UPDATING THE GLOBAL STATISTICS
  navigationGobalStats.querySelector(".population h1").innerText = data["totalPopulation"];
  navigationGobalStats.querySelector(".total-countries h1").innerText = data["totalPays"];
  navigationGobalStats.querySelector(".total-timezones h1").innerText = data["totalTimezones"];

  // PAGINATION
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const countriesToShow = data["countries"].slice(startIndex, endIndex);

  // UPDATE TIME
  let tableRows = `
    <tr>
      <td>iso code</td>
      <td>Country</td>
      <td>timezone</td>
      <td>Time</td>
    </tr>
  `;
  for (const country of countriesToShow) {
    tableRows += `
      <tr class="time-container-tz">
        <td>${country['alpha2']}</td>
        <td>${country['nom_en_gb']}</td>
        <td class="timezone">${country['timezone'] || "Not specified"}</td>
        <td class="clock">${getTimeByTimeZone(country['timezone'] || "Not specified")}</td>
      </tr>
    `;
  }
  navigationTime.innerHTML = tableRows;
}

// GET TIME BY TIME ZONE
function getTimeByTimeZone(timeZone) {

  // USE TRY -CATCH TO RESOLVE ERRORS FROM OCCURING
  try {
    new Intl.DateTimeFormat('en-US', { timeZone: timeZone }).format();

    const formatter = new Intl.DateTimeFormat('en-US', {
      timeZone: timeZone,
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric'
    });

    // THE TIME ZONE IS VALID 

    const currentTime = formatter.format(new Date());

    // console.log('Current time in ' + timeZone + ': ' + currentTime);

    // RETURN CURRENT TIME
    return currentTime;
  } catch (error) {
    // console.error('Invalid time zone specified: ' + timeZone);

    // HANDLE THE INVALID TIMEZONE
    return null;
  }
}

// =================== SETINTRVAL FUNCTIONS =============================
function updateTimes() {

  const countries = document.querySelectorAll(".time-container-tz");

  countries.forEach((country) => {
    let countryTimeZone = country.querySelector(".timezone").innerText;
    let countryClock = country.querySelector(".clock");

    if (countryTimeZone !== "Not specified" && countryClock.innerText !== "Not specified") {
      countryClock.innerText = getTimeByTimeZone(countryTimeZone);
    }
  });
}


// ===================SETINTERVAL CALLINGS ==========================

setInterval(updateTimes, 1000)
  // SCRIPT TO RUN AFTER LAODING THE DOCUMENT
onload = () => {
    
    // TOGGLE DASHBOARD
    dashboardCloser.addEventListener('click', () => {
      dashboardCloser.closest(".dashboard").classList.toggle("close");
    });

    // profile Expanding
    profileChevron.addEventListener("click", () => {
      profileExpand.classList.toggle("open");
      profileChevron.classList.toggle("clicked");
    })

    // CUSTOMIZING COUNTRIES HOVER EFFECT
    worldmapCountries.forEach((country) => {
      country.addEventListener("mouseover", () => {
        tootip.innerHTML = country.getAttribute("name") ?? (country.getAttribute("class") ?? "country");
      })
    });

    // SETTING CLOCK
    function updateTime() {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();

      const hourHand = document.querySelector('.h-hand');
      const minuteHand = document.querySelector('.min-hand');
      const secondHand = document.querySelector('.sec-hand');

      const hourHandRotation = (hours % 12) / 12 * 360 + (minutes / 60 * 30);
      const minuteHandRotation = minutes / 60 * 360;
      const secondHandRotation = seconds / 60 * 360;

      hourHand.style.transform = `translate(-50%, -100%) rotate(${hourHandRotation}deg)`;
      minuteHand.style.transform = `translate(-50%, -100%) rotate(${minuteHandRotation}deg)`;
      secondHand.style.transform = `translate(-50%, -100%) rotate(${secondHandRotation}deg)`;
    }

    // first call 
    updateTime();
    // update clock after 1s
    setInterval(updateTime, 1000);

    // NAVIGATION
    navigate(dashboardLinks, sections);
    navigate(settingsLinks, settingsSections);

    // MODE SWITCHER
    modeSwitch.addEventListener('click', (e) => {
      modeSwitch.classList.toggle("dark");
    });

    // HANDLING POPUPS / MODALS

    // LOGIN DIALOG MODAL
    loginBtn.addEventListener('click', e => loginModal.showModal());
    loginBtnClose.addEventListener('click', e => loginModal.close());

    // ALTER COUNTRIES MODAL
    countriesTable.addEventListener("click", function(event) {
      const target = event.target;

      if (target.classList.contains("alter-btn")) {
        const countryCode = target.getAttribute("data-contry");

        // Perform any action or logic based on the clicked alter button
        // Example: Show a modal, perform an AJAX request, etc.
        alterModal.showModal();
        console.log("Clicked alter button for country: ", countryCode);
      }
    });
    alterBtnClose.addEventListener('click', e => alterModal.close());

    // SEARCH BARS
  searchCountryBars.forEach((searchbar) => {

    // SELECTING THE PARENT ELEMENT CONTAINER AND THEN SELECTING THE RESULT BOX
    const resultsContainer = searchbar.closest(".search").querySelector(".results");
    console.log(resultsContainer);
    // ADDING THE EVENT INPUT (WHILE TYPING)
    searchbar.addEventListener("input", () => {

      // GETTING THE TYPED TEXT
      const searchTerm = searchbar.value.toLowerCase();

      // SELECTING THE ALL ELEMENTS OF COUNTRIES SECTION
      const countries = Array.from(countriesTable.getElementsByTagName("tr"));

      // REMOVING THE HEADER ROW
      countries.shift();

      // EMPTYING THE RESULTS CONTAINER (-CLEAR PREV SEARCH)
      resultsContainer.querySelector(".container").innerHTML = ""; 

      // LOOPING THE COUNTRIES 
      countries.forEach((country) => {

        // SELECTING THE COUNTRY NAME
        const countryName = country.querySelector("td:nth-child(2)").innerText.toLowerCase();

        // SELECTING THE IMG SRC ATTR (FLAG)
        const countryFlag = country.querySelector("td:first-child img").getAttribute("src");

        // SELECTING COUNTRY ISO CODE
        const countryIso = country.querySelector("td:nth-child(3)").innerText.split(" - ")[0].toUpperCase();

        // TESTING IF THE COUNTRY NAME MATCHES THE SEARCH INPUT
        if (countryName.includes(searchTerm)) {

          // CREATING AN ELEMENT TO STORE THE COUNTRY
          const resultElement = document.createElement("div");

          // ADDING ATTRS & CONTENT
          resultElement.setAttribute("class", "country flx");
          resultElement.setAttribute("data-iso", countryIso);
          resultElement.innerHTML = `
            <img src="${countryFlag}" alt="">
            <span>${countryName}</span>
          `;

          // APPENDING THE ELEMENT TO RESULT CONTAINER
          resultsContainer.querySelector(".container").appendChild(resultElement);
        }
      });

      resultsContainer.classList.add("open");
    });
      resultsContainer.addEventListener("click", (e) => {
        const countries = resultsContainer.querySelectorAll(".container .country");
        countries.forEach(country => {
          if (e.target == country || e.target == country.children[0] || e.target == country.children[1])
            zoomCountry(country.dataset.iso, true);
            resultsContainer.classList.remove("open");
            resultsContainer.querySelector(".container").innerHTML = "";
        });
      });
    document.addEventListener("click", function (e) {
      if (!searchbar.contains(e.target)) {
        resultsContainer.classList.remove("open");
        resultsContainer.querySelector(".container").innerHTML = "";
      }
    })
  });
  
    // GET MAP
    var vectorLayer = new ol.layer.Vector({
      source: new ol.source.Vector({
        url: 'https://raw.githubusercontent.com/mledoze/countries/master/mar.geo.json',
        format: new ol.format.GeoJSON()
      })
    });

    var map = new ol.Map({
      target: 'mapCountry',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        }),
        vectorLayer
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([-7.6, 31.8]),
        zoom: 6
      })
    });
  
  // SEARCH COUNTRY IN COUNTRY SECTION
  searchInput.addEventListener("input", function () {

    const rows = countriesTable.querySelectorAll("tr");
    const searchTerm = searchInput.value.toLowerCase();

    for (let i = 1,length = rows.length; i < length; i++) {
      const countryName = rows[i].querySelector("td:nth-child(2)").innerText.toLowerCase();

      if (countryName.includes(searchTerm)) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  });
  
  // SORT COUNTRIES 
  sortSelect.addEventListener("change", function () {

    // CREATING AN ARRAY FROM COUNTRIES ROW
    const rows = Array.from(countriesTable.getElementsByTagName("tr"));

    // GETTING THE SORT OPTION
    const sortOption = sortSelect.value;

    // REMOVING THE FIRST ELEMENT OF ARRAY( HEADING ) AND RESERVING IT IN A VAR
    let headerRow = rows.shift(); // Remove and save the header row

    // USING THE SORT FUNCTION TO SORT ROWS
    rows.sort((a, b) => {

      // COUNTRY NAME OF ROW -A-
      const aText = a.querySelector("td:nth-child(2)").innerText.toLowerCase();

      // COUNTRY NAME OF ROW -B-
      const bText = b.querySelector("td:nth-child(2)").innerText.toLowerCase();

      // POPULATION OF ROW -A- (IF NOT SET = 0)
      const aPopulation = parseInt(a.querySelector("td:nth-child(5)").innerText) || 0;

      // POPULATION OF ROW -B- (IF NOT SET = 0)
      const bPopulation = parseInt(b.querySelector("td:nth-child(5)").innerText) || 0;

      // USING SWITCH STATEMENT TO DETERMINE SORT TYPE
      switch (sortOption) {
        case "names-A-Z":

          // SORT BY ALPHABETS INC
          return aText.localeCompare(bText)
        case "names-Z-A":

          // SORT BY ALPHABETS DEC
          return bText.localeCompare(aText);
        case "population-INC":

          // SORT BY POPULATION INC
          return aPopulation - bPopulation
        case "population-DEC":

          // SORT BY POPULATION DEC
          return bPopulation - aPopulation
      };
    });

    // CLEAR THE TABLE 
    countriesTable.innerHTML = "";

    // APPENDNG EACH ROW INTO TABLE
    rows.forEach(row => {
      countriesTable.appendChild(row);
    });

    // PREPENDING THE HEAD ROW (ADD TO START)
    countriesTable.prepend(headerRow);
});

    // ========================= INIT FUNCTIONS ==========================
    // FETCHING DATA;
    fetchData();

    // UPDATE TIME EVRY SECOND
    updateTimes()
  }