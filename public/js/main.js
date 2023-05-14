// FUNCTIONS

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

onload = () => {
  // SELECT ELEMENTS
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

  const alterBtns = document.querySelectorAll(".alter-btn");
  const alterBtnClose = document.querySelector(".alter-btn-close");
  const alterModal = document.querySelector(".alter-modal");

  const settingsLinks = document.querySelectorAll(".settings .rows .links li");
  const settingsSections = document.querySelectorAll(".settings .rows .confs .section");

  const searchCountryBars = document.querySelectorAll(".search-country");

  // DECLARE GLOBAL VARS


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
  navigate(dashboardLinks,sections);
  navigate(settingsLinks,settingsSections);

  // MODE SWITCHER
  modeSwitch.addEventListener('click', (e) => {
    modeSwitch.classList.toggle("dark");
  });

  // HANDLING POPUPS / MODALS

  // LOGIN DIALOG MODAL
  loginBtn.addEventListener('click', e => loginModal.showModal());
  loginBtnClose.addEventListener('click', e => loginModal.close());
  
  // ALTER COUNTRIES MODAL
  alterBtns.forEach((btn) => {
    btn.addEventListener('click', e => alterModal.showModal())
  } );
  alterBtnClose.addEventListener('click', e => alterModal.close());

  // SEARCH BARS
  searchCountryBars.forEach((searchbar) => {
    searchbar.addEventListener("input", () => {
      searchbar.closest(".search").classList.add("open");
    });
    searchbar.addEventListener("blur", () => {
      searchbar.closest(".search").classList.remove("open");
    });
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
}