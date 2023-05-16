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

const loginForm = document.querySelector("#loginForm");

const updatePasswordForm = document.querySelector("#password-reset-form");


// GLOBAL VARS
let countriesData = [];

let authenticated = sessionStorage.getItem("authenticated") === "true";

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

// AUTHENTICATION
function authentication(userid,password) {
  $.ajax({
    url: "/MAPMATE/php/auth.php",
    method: "POST",
    dataType: "json",
    data: {
      "userid" : userid,
      "password" : password
    },
    success: function (data) {
      console.log(data);
      if (data.success) {
        location.reload();
        sessionStorage.setItem("authenticated","true");
        showPopupAlert('Login success', '#1bcfb4');
      } else {
        sessionStorage.removeItem("authenticated")
        showPopupAlert('Login failed', '#fe9496');
      }
    },
    error: function(xhr, status, error) {
      console.log("An error occurred: " + error);
    }
  });
}

// LOGOUT 
function logOut(){
  $.ajax({
    url: "/MAPMATE/php/logout.php",
    method: "POST",
    dataType: "json",
    success: function (data) {
      if (data.success) {
        location.reload();
        sessionStorage.removeItem("authenticated");
      } else {
        console.log("Error: you didn't logout ");
      }
    },
    error: function(xhr, status, error) {
      console.log("An error occurred: " + error);
    }
  });

};

// UPDATE COUNTRY 
function updateCountry(iso,population,capital) {
  $.ajax({
    url: "/MAPMATE/php/updatecountry.php",
    method: "POST",
    dataType: "json",
    data: {
      "iso": iso,
      "population": population,
      "capital" :capital
    },
    success: function (data) {

      // FETCH DATA
      fetchData();

      // CHECK UPDATE FOR CAPITAL
      if (data.capital.executed) {
        if (data.capital.success == true) {
          showPopupAlert(data.capital.message, '#1bcfb4');
        } else {
          showPopupAlert(data.capital.message, '#fe9496');
        }
      }

      // CHECK UPDATE FOR POPULATION
      if (data.population.executed) {
        if (data.population.success == true) {
          showPopupAlert(data.population.message, '#1bcfb4');
        } else {
          showPopupAlert(data.population.message, '#fe9496');
        }
      }

    },
    error: function(xhr, status, error) {
      console.log("An error occurred: " + error);
    }
  });
}

// UPDATE PASSWORD
function updatePassword(newPassword,currentPassword) {
  $.ajax({
    url: "/MAPMATE/php/resetpassword.php",
    method: "POST",
    dataType: "json",
    data: {
      "currentpassword" : currentPassword,
      "newpassword" : newPassword
    },
    success: function (data) {
      console.log(data);
      if (data.success) {
        showPopupAlert(data.message, '#1bcfb4');
      } else {
        showPopupAlert(data.message, '#fe9496');
      }
    },
    error: function(xhr, status, error) {
      console.log("An error occurred: " + error);
    }
  });
}
// ================= END AJAX BLOCK ========================
function showPopupAlert(message , color) {
  // Create the popup alert element
  var popupAlert = $('<div>', {
    id: 'popupAlert',
    class: 'popup-alert',
    text: message
  });

  // Set the initial styles
  popupAlert.css({
    position: 'absolute',
    top: '10%',
    left: '-100%',
    transform: 'translateX(-100%)',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: color,
    color: '#fff',
    width: '100%',
    height: '100px',
    padding: '10px',
    borderRadius: '0px',
    opacity: '0',
    zIndex: '9999',
    textAlign: 'center',
  });

  // Append the element to the body
  $('body').append(popupAlert);

  // Add animation effects
  popupAlert.animate({
    left: '100%',
    opacity: '1'
  }, 1000).delay(2000).animate({
    left: '-100%',
    opacity: '0'
  }, 1000, function() {
    // Animation complete
    // Remove the element from the DOM
    popupAlert.remove();
  });
}

// Example usage:
showPopupAlert('Login failed');


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

// SANITIZE INPUT 
function sanitizeInput(input) {
    
  // CREATE A TEMP CONTAINER TO STORE THE INPUT
    let tempElement = document.createElement("div");

  // APPENDING THE ELEMENT TEXT NODE
  tempElement.textContent = input;
  
  // ENCONDING ANY SPECIAL CHARS
    return tempElement.innerHTML;
  }

// GET COUNTRY INFO
async function getCountryInfo(countryCode) {
  const url = `https://restcountries.com/v2/alpha/${countryCode}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    console.log(data);
    return data;
  } catch (error) {
    console.log(error);
  }
}

// UPDATING ZOOM SECTION
function zoomCountry(iso, openSection = false) {
  const countryZoomName = document.getElementById("country-zoom-name");
  const countrZoomFlag = document.getElementById("country-zoom-flag");
  const zoom_li_name = document.getElementById("zoom-li-name");
  const zoom_li_capital = document.getElementById("zoom-li-capital");
  const zoom_li_population = document.getElementById("zoom-li-population");
  const zoom_li_region = document.getElementById("zoom-li-region");
  const zoom_li_subregion = document.getElementById("zoom-li-subregion");
  const zoom_li_timezones = document.getElementById("zoom-li-timezones");
  const zoom_li_currencies = document.getElementById("zoom-li-currencies");
  const zoom_li_languages = document.getElementById("zoom-li-languages");
  const zoom_li_alpha2code = document.getElementById("zoom-li-alpha2code");
  const zoom_li_calling = document.getElementById("zoom-li-calling");
  const mapCountryContainer = document.getElementById("mapCountryContainer");
  if (openSection == true) {
    document.getElementById("zoom-country").click();
  }
  if (iso == null) {
    return null;
  }
  mapCountryContainer.innerHTML = `<div class="mapCountry" id="mapCountry"></div>`;
  countryZoomName.innerHTML = '';
  countrZoomFlag.innerHTML = '';
  zoom_li_name.innerHTML = '';
  zoom_li_capital.innerHTML = '';
  zoom_li_population.innerHTML = '';
  zoom_li_region.innerHTML = '';
  zoom_li_subregion.innerHTML = '';
  zoom_li_timezones.innerHTML = '';
  zoom_li_currencies.innerHTML = '';
  zoom_li_languages.innerHTML = '';
  zoom_li_alpha2code.innerHTML = '';
  zoom_li_calling.innerHTML = '';
  getCountryInfo(iso)
    .then(countryInfo => {
      var vectorLayer = new ol.layer.Vector({
      source: new ol.source.Vector({
        url: 'https://raw.githubusercontent.com/mledoze/countries/master/'+countryInfo.alpha3Code.toLowerCase()+'.geo.json',
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
      countryZoomName.innerHTML = countryInfo.name;
      countrZoomFlag.setAttribute("src", countryInfo.flag);
      zoom_li_name.innerHTML = countryInfo.name; 
      zoom_li_capital.innerHTML = countryInfo.capital; 
      zoom_li_population.innerHTML = countryInfo.population; 
      zoom_li_region.innerHTML = countryInfo.region; 
      zoom_li_subregion.innerHTML = countryInfo.subregion; 
      zoom_li_timezones.innerHTML = countryInfo.timezones.join(", "); 
      zoom_li_currencies.innerHTML = countryInfo.currencies.map(currency => currency.name + " "+ currency.symbol).join(', '); 
      zoom_li_languages.innerHTML = countryInfo.languages.map(language => language.name).join(', '); 
      zoom_li_alpha2code.innerHTML = countryInfo.alpha2Code +" - " + countryInfo.alpha3Code; 
      zoom_li_calling.innerHTML = countryInfo.callingCodes.map(code => code).join(", "); 
    }) 
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
  try {
    loginBtn.addEventListener('click', e => loginModal.showModal());
    loginBtnClose.addEventListener('click', e => loginModal.close());
  } catch (error) {
    
  }

    // ALTER COUNTRIES MODAL
    countriesTable.addEventListener("click", function(event) {
      const target = event.target;

      if (target.classList.contains("alter-btn")) {
        if (authenticated) {
          const countryCode = target.getAttribute("data-contry");

        // USER IS AUTHENTICATED 
          alterModal.querySelector('form').innerHTML = `
          <div class="field  flx">
            <label for="countryName" class="icon flx"><i class="fa fa-solid fa-globe"></i></label>
            <input disabled type="text" value="${countryCode}" name="countryIso" id="countryIso">
          </div>
          <div class="field  flx">
            <label for="capital" class="icon flx"><i class="fa fa-solid fa-flag"></i></label>
            <input placeholder="capital" type="text" value="" name="capital" id="capital">
          </div>
          <div class="field  flx">
            <label for="population" class="icon flx"><i class="fa fa-solid fa-people-group"></i></label>
            <input type="number" value='' name="population" id="population">
          </div>
          <div class="field buttons  flx">
            <input placeholder="population" type="submit" name="submit" value="update">
            <input type="reset" class="alter-btn-close" name="reset" value="cancel">
          </div>
          `;
        alterModal.showModal();
        console.log("Clicked alter button for country: ", countryCode);
        } else {
          console.log("user not autheticated");
        }
      }
    });
  try {
    alterModal.addEventListener('click', (e) => {
      
      if (e.target.classList.contains("alter-btn-close")) {
        alterModal.close();
      }
    })
  } catch (e) {
    // CATCHED ERROR
  }

  // ULTER COUNTRY SUBMISSION
  alterModal.querySelector("form").onsubmit = function (e) {
    
    let iso = alterModal.querySelector("form").querySelector("#countryIso").value;
    let population = alterModal.querySelector("form").querySelector("#population").value;
    let capital = alterModal.querySelector("form").querySelector("#capital").value;

    // APPLYING FILTERS 
    capital = sanitizeInput(capital);
    iso = sanitizeInput(iso);
    let filterPopulation = (population) => {
      try {
        return population.match(/\d+/g).join("");
      } catch (e) {
        return 0;
      }
    };
    updateCountry(iso ,filterPopulation(population) , capital);
  }


  // SEARCH BARS
  searchCountryBars.forEach((searchbar) => {

    // SELECTING THE PARENT ELEMENT CONTAINER AND THEN SELECTING THE RESULT BOX
    const resultsContainer = searchbar.closest(".search").querySelector(".results");

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

  // LOGIN FORM 
  loginForm.addEventListener("submit", (e) => {
    
    // PREVENTING FORM FROM SUBMITING
    e.preventDefault();

    // GET INPUTS
    let userIdInput = document.getElementById("userid");
    let userPasswordInput = document.getElementById("userpassword");

    // SANITIZE INPUTS
    let userId = sanitizeInput(userIdInput.value);
    let userPassword = sanitizeInput(userPasswordInput.value);

    // VALIDATE INPUTS
    if (userId.trim() === "") {

      userIdInput.closest(".field").style.cssText= " outline : 1px solid #fe9496;";
      userIdInput.focus();
      return;
    } else {
      userIdInput.closest(".field").style.cssText= " outline : none";
    }
    if (userPassword.trim() === "") {

      userPasswordInput.closest(".field").style.cssText= " outline : 1px solid #fe9496;";
      userPasswordInput.focus();
      return;
    } else {
      userPasswordInput.closest(".field").style.cssText= " outline : none";
    }

    console.log(authentication(userId, userPassword));
    // RESET FORM
    // loginForm.reset();
  });

  // UPDATE PASSWORD FORM 
  updatePasswordForm.onsubmit = function (e) {
    e.preventDefault();
    // GETTING INPUTS VALUES AND SANITIZING
    const currentPassword = sanitizeInput(updatePasswordForm.querySelector("#currentpassword").value);
    const newPassword = sanitizeInput(updatePasswordForm.querySelector("#newpassword").value);

    // CHECKING IF BOTH PASSWORD ARE SET
    if (currentPassword != "" && newPassword != "") {
      
      // AJAX CALLING
      updatePassword(newPassword, currentPassword);
    }
  };
    // ========================= INIT FUNCTIONS ==========================
    // FETCHING DATA;
    fetchData();

    // UPDATE TIME EVRY SECOND
    updateTimes()
  }