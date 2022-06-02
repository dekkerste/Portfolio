let map = L.map("map", {
  center: [52.8, 4.7],
  zoom: 10,
  //layers: [grayscale, cities],
  fadeAnimation: false,
});

//get params from url
let params = new URLSearchParams(location.search);
let urlX = params.get('X');
let urlY = params.get('Y');

if (urlX !== null && urlY !== null) { //set map view to params from url
  map.flyTo([urlX, urlY], 10);
}

L.tileLayer(
  "https://api.mapbox.com/styles/v1/bas12345/cl2yp9neq002k15mxduv75jnv/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiYmFzMTIzNDUiLCJhIjoiY2wyeW1vZjZsMDJodzNqbzE2eXNoMjZvbyJ9._tRuGwpLo9_1MMd1ptxRbA",
  {
    attribution: "MKO",
    // maxZoom: 8,
    id: "mapbox/streets-v8",
    tileSize: 512,
    zoomOffset: -1,
    minZoom: 3,
    accessToken:
      "pk.eyJ1IjoiYmFzMTIzNDUiLCJhIjoiY2wyeW1vZjZsMDJodzNqbzE2eXNoMjZvbyJ9._tRuGwpLo9_1MMd1ptxRbA",
  }
).addTo(map);

let southWest = L.latLng(-90, -200),
  northEast = L.latLng(90, 200);
let bounds = L.latLngBounds(southWest, northEast);

map.setMaxBounds(bounds);
map.on('drag', function () {
  map.panInsideBounds(bounds, { animate: false });
});

function createMarkerForm() {
  let dynamicForm;
  let object = document.querySelector('input[name="object"]:checked').value;
  object == "Ship" ? dynamicForm = 0 : dynamicForm = 1;
  object == "Obstacle" ? dynamicForm = 1 : dynamicForm = 0;
  if (dynamicForm == 0 || dynamicForm == 1) {
    document.querySelector('input[id="inputTextName"]').style.display = "";
    document.querySelector('input[id="inputTextX"]').style.display = "";
    document.querySelector('input[id="inputTextY"]').style.display = "";
    document.querySelector('label[id="obstacleTypeLabel"]').style.display = "";
    document.querySelector('input[id="obstacle0"]').style.display = "";
    document.querySelector('label[id="obstacle0Label"]').style.display = "";
    document.querySelector('input[id="obstacle1"]').style.display = "";
    document.querySelector('label[id="obstacle1Label"]').style.display = "";
    document.querySelector('label[id="affiliationTypeLabel"]').style.display = "";
    document.querySelector('input[id="affiliation0"]').style.display = "";
    document.querySelector('label[id="affiliation0Label"]').style.display = "";
    document.querySelector('input[id="affiliation1"]').style.display = "";
    document.querySelector('label[id="affiliation1Label"]').style.display = "";
    document.querySelector('input[id="affiliation2"]').style.display = "";
    document.querySelector('label[id="affiliation2Label"]').style.display = "";
    document.querySelector('button[id="mrkbtn"]').style.display = "";
    document.querySelector('input[id="obstacle0"]').disabled = false;
    document.querySelector('input[id="obstacle1"]').disabled = false;
  }
  if (dynamicForm == 0) {
    document.querySelector('label[id="obstacleTypeLabel"]').style.display = "none";
    document.querySelector('input[id="obstacle0"]').style.display = "none";
    document.querySelector('label[id="obstacle0Label"]').style.display = "none";
    document.querySelector('input[id="obstacle1"]').style.display = "none";
    document.querySelector('label[id="obstacle1Label"]').style.display = "none";
    document.querySelector('input[id="obstacle0"]').disabled = true;
    document.querySelector('input[id="obstacle1"]').disabled = true;
  }
};

// receives php data in index.php and shows the locations on the map
function showmarker() {
  let author = getUsername();
  let json = getJsonData();

  if (json.length > 0) {
    json.forEach(marker => {
      if (marker.public == "1" || marker.author == author) {
        let attackStatus = document.createElement('p');
        attackStatus.style.textAlign = "center";
        if (marker.destroyed == "1")
        {
          attackStatus.innerText = "This marker has been destroyed";
        }
        else
        {
          if (marker.attackstatus == "1")
          {
            attackStatus.innerText = "This marker is under attack!";
          }
          else if (marker.attackstatus == "0")
          {
            attackStatus.innerText = "This marker is currently safe";
          }
        }
        let editBtn = document.createElement('button');
        editBtn.innerText = "Edit marker";
        editBtn.onclick = function () {
          document.getElementById('editMarkerDiv').hidden = false;
          if (marker.public == "1")
            {
              document.getElementById('publishText').style.display = "inline";
              document.getElementById('markerLatForm').style.display = "inline";
              document.getElementById('markerLngForm').style.display = "inline";
              document.getElementById('markerObjectForm').style.display = "none";
              document.getElementById('markerAffiliationForm').style.display = "none";
              document.getElementById('markerNameForm').style.display = "none";
            }
          else if (marker.public == "0")
            {
              document.getElementById('publishText').style.display = "none";
              document.getElementById('markerObjectForm').style.display = "inline";
              document.getElementById('markerAffiliationForm').style.display = "inline";
              document.getElementById('markerLatForm').style.display = "inline";
              document.getElementById('markerLngForm').style.display = "inline";
              document.getElementById('markerNameForm').style.display = "inline";
            }
          getMarkedData(marker.id);
        }

        let markerDiv = document.createElement('div');
        markerDiv.append(attackStatus);
        if (marker.destroyed == "0")
        {
          markerDiv.append(editBtn);
        }

        let img;

        if (marker.affiliation == "Friendly") {
          if (marker.object == "Ship") {
            img = L.icon({
              iconUrl: "images/blue-" + marker.object.toLowerCase() + ".png",
              iconSize: [15,37.5]
            });
          }
          else if (marker.object == "Oilplatform") {
            img = L.icon({
              iconUrl: "images/blue-" + marker.object.toLowerCase() + ".png",
              iconSize: [25,25]
            });
          }
          else if (marker.object == "Windmill") {
            img = L.icon({
              iconUrl: "images/blue-" + marker.object.toLowerCase() + ".png",
              iconSize: [30,30]
            });
          }
        }
        else if (marker.affiliation == "Enemy") {
          if (marker.object == "Ship") {
            img = L.icon({
              iconUrl: "images/red-" + marker.object.toLowerCase() + ".png",
              iconSize: [15,37.5]
            });
          }
          else if (marker.object == "Oilplatform") {
            img = L.icon({
              iconUrl: "images/red-" + marker.object.toLowerCase() + ".png",
              iconSize: [25,25]
            });
          }
          else if (marker.object == "Windmill") {
            img = L.icon({
              iconUrl: "images/red-" + marker.object.toLowerCase() + ".png",
              iconSize: [30,30]
            });
          }
        }
        else {
          if (marker.object == "Ship") {
            img = L.icon({
              iconUrl: "images/grey-" + marker.object.toLowerCase() + ".png",
              iconSize: [15,37.5]
            });
          }
          else if (marker.object == "Oilplatform") {
            img = L.icon({
              iconUrl: "images/grey-" + marker.object.toLowerCase() + ".png",
              iconSize: [25,25]
            });
          }
          else if (marker.object == "Windmill") {
            img = L.icon({
              iconUrl: "images/grey-" + marker.object.toLowerCase() + ".png",
              iconSize: [30,30]
            });
          }
        }

        let mark = L.marker([marker.lat, marker.lng], { icon: img, author: marker.author, id: marker.id, name: marker.name, object: marker.object, affiliation: marker.affiliation, public: marker.public, attackstatus: marker.attackstatus, destroyed: marker.desetroyed, draggable: true }).on("drag", onMarkerMove);

        mark.addTo(map);
        mark.bindPopup(markerDiv, { maxWidth: 'auto' });
        markerArray.push(mark);
      }
    })
  }
  else {
    setTimeout(function () {
      showmarker();
    }, 1000);
  }
}

function onMarkerMove(e) {
  document.getElementById("markerLngForm").value = e.latlng.lng;
  document.getElementById("markerLatForm").value = e.latlng.lat;
}

function addmarker() {
  // get input data from HTML
  let inputX = document.getElementById('inputTextX').value;
  let inputY = document.getElementById('inputTextY').value;
  let inputName = document.getElementById('inputTextName').value;
  let objectType = document.querySelector('input[name="object"]:checked').value;

  // check if a radio button has been selected
  if (objectType !== null) {
    // prepares button for markers
    let markerBtn = document.createElement('button');
    markerBtn.innerText = 'Delete Marker';
    markerBtn.onclick = function () {
      map.removeLayer(mark);
    }

    // prepares text for markers
    let markerInfo = document.createElement('p');
    markerInfo.innerText = 'Name: ' + inputName;

    // prepares div for markers
    let markerDiv = document.createElement('div');
    markerDiv.append(markerInfo);
    markerDiv.append(markerBtn);

    // add marker to map
    let mark = L.marker([inputY, inputX]);

    mark.addTo(map);
    mark.bindPopup(markerDiv, { maxWidth: 'auto' });
    markerArray.push(mark);
  }

}

let popup = L.popup();

function onMapMove(e) {
  popup
    .setLatLng(e.latlng)
  document.getElementById("y").innerHTML = "Latitude: " + e.latlng.lat.toFixed(10).toString();
  document.getElementById("x").innerHTML = "Longitude: " + e.latlng.lng.toFixed(10).toString();
}

function onMapClick(e) {
  document.getElementById("inputTextX").value = e.latlng.lng.toFixed(10).toString();
  document.getElementById("inputTextY").value = e.latlng.lat.toFixed(10).toString();
}

// array with all markers from database
let markerArray = [];
let courseArray = [];

// when clicked on the marker, shows the coördinates of the clicked marker
function getMarkedData(id) {
  markerArray.forEach(marker => {
    if (marker.options.id == id) {
      document.getElementById("markerPublicForm").value = marker.options.public;
      document.getElementById("markerIdForm").value = marker.options.id;
      document.getElementById("markerNameForm").value = marker.options.name;
      document.getElementById("markerObjectForm").value = marker.options.object;
      document.getElementById("markerAffiliationForm").value = marker.options.affiliation;
      document.getElementById("markerLatForm").value = marker._latlng.lat;
      document.getElementById("markerLngForm").value = marker._latlng.lng;

      if (marker.options.public == true) {
        document.getElementById("markerVisibleForm").disabled = true;
        document.getElementById("markerDeleteForm").disabled = true;
        attackOrder();
      }
      else {
        document.getElementById("markerVisibleForm").disabled = false;
        document.getElementById("markerDeleteForm").disabled = false;
        disableAll();
      }

      function attackOrder() {
        if (marker.options.attackstatus == true) {
          document.getElementById("markerAttackForm").disabled = true;
          destroyOrder();
        }
        else {
          let author = getUsername();
          if (marker.options.author == author || marker.options.affiliation == "Friendly") {
            document.getElementById("markerAttackForm").disabled = true;
          }
          else {
            document.getElementById("markerAttackForm").disabled = false;
          }
        }
      }

      function destroyOrder() {
        if (marker.options.destroyed == true) {
          document.getElementById("markerDestroyedForm").disabled = true;
        }
        else {
          document.getElementById("markerDestroyedForm").disabled = false;
        }
      }

      function disableAll() {
        document.getElementById("markerAttackForm").hidden = true;
        document.getElementById("markerDestroyedForm").hidden = true;
      }
    }
  })
}

function showCourse() {
  courseArray.forEach(courseArr => {
    map.removeLayer(courseArr)
  });
  courseArray = [];

  let markerId = document.getElementById("markerIdForm").value;
  let tboJson = getTboLocations(markerId);
  let courses = [];
  
  tboJson.forEach(json => {
    if (json.markerID == markerId) {
      let latlng = new L.LatLng(json.lat, json.lng);
      courses.push(latlng);
    }
  });

  let polyline;
  polyline = new L.Polyline(courses, {
    color: '#eb4326',
    weight: 5,
    opacity: 1,
    smoothFactor: 1
  });
  polyline.addTo(map);
  courseArray.push(polyline);
}

function publishMarker() {
  markerArray.forEach(marker => {
    if (marker.options.id == document.getElementById("markerIdForm").value) {
      let confirmationTxt = "Are you sure you want to publish this marker? Once a marker is published it will become visible to all and CAN'T be unpublished or deleted again. \n\nProceed?";
      if (confirm(confirmationTxt) == true) {
        document.getElementById("markerPubId").value = marker.options.id;
        document.getElementById("markerPubName").value = marker.options.name;
        document.getElementById("publishForm").submit();
      }
    }
  });
}

function deleteMarker() {
  markerArray.forEach(marker => {
    if (marker.options.id == document.getElementById("markerIdForm").value) {
      let confirmationTxt = "Are you sure you want to delete this marker? (This action CAN'T be undone!)";
      if (confirm(confirmationTxt) == true) {
        map.removeLayer(marker);
        document.getElementById("markerDelId").value = marker.options.id;
        document.getElementById("markerDelName").value = marker.options.name;
        document.getElementById("deleteForm").submit();
      }
    }
  });
}

function attackMarker() {
  markerArray.forEach(marker => {
    if (marker.options.id == document.getElementById("markerIdForm").value) {
      let confirmationTxt = "Are you sure you want to attack this marker?";
      if (confirm(confirmationTxt) == true) {
        document.getElementById("markerAttId").value = marker.options.id;
        document.getElementById("markerAttName").value = marker.options.name;
        document.getElementById("attackForm").submit();
      }
    }
  });
}

function destroyMarker() {
  markerArray.forEach(marker => {
    if (marker.options.id == document.getElementById("markerIdForm").value) {
      let confirmationTxt = "Are you sure you want to destroy this marker?";
      if (confirm(confirmationTxt) == true) {
        document.getElementById("markerDestroyId").value = marker.options.id;
        document.getElementById("markerDestroyName").value = marker.options.name;
        document.getElementById("destroyForm").submit();
      }
    }
  });
}

function cancelSubmit() {
  document.getElementById("editMarkerForm").hidden = true;
}

map.on('mousemove', onMapMove);
map.on('click', onMapClick);

function locate() {
  window.addEventListener("load", function () {
    geoFindMe();
    showmarker();
  });
  // Function that finds your device's current location
  function geoFindMe() {

    const status = document.querySelector('#status');
    const mapLinkX = document.querySelector('#map-linkX');
    const mapLinkY = document.querySelector('#map-linkY');

    function success(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      makeMyMap(latitude, longitude);
    }
    // If the location cannot be found the user gets this error
    function error() {
      status.textContent = 'Kan uw locatie niet ophalen';
    }
    // If geolocation is not supported by the users browser this error pops up
    if (!navigator.geolocation) {
      status.textContent = 'Geolocatie wordt niet ondersteund in uw browser!';
    } else {
      status.textContent = 'Locatie ophalen..';
      navigator.geolocation.getCurrentPosition(success, error);
    }
    // This adds a marker to the current geolocation of the user
    function makeMyMap(mylat, mylong) {
      L.marker([mylat, mylong]).addTo(map)
        .bindPopup("<b>U are here!</b>").openPopup();
    }
  }
}