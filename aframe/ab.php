<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>WebVR - Aframe - VR walkthrough</title>
  <meta name="description" content="WebVR - Aframe - VR walkthrough">

  <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
  <!--animation component scripts-->
  <script src="https://unpkg.com/aframe-animation-component@^4.1.2/dist/aframe-animation-component.min.js"></script>
  <script src="https://unpkg.com/aframe-look-at-component@0.5.1/dist/aframe-look-at-component.min.js"></script>
  <script src="https://unpkg.com/super-hands@3.0.0/dist/super-hands.min.js"></script>
  <script src="../node_modules/aframe-gamepad-controls/dist/aframe-gamepad-controls.js"></script>
  <script>
    AFRAME.registerComponent('hotspots', {
      init: function() {
        this.el.addEventListener('reloadspots', function(evt) {

          //get the entire current spot group and scale it to 0
          var currspotgroup = document.getElementById(evt.detail.currspots);
          currspotgroup.setAttribute("scale", "0 0 0");

          //get the entire new spot group and scale it to 1
          var newspotgroup = document.getElementById(evt.detail.newspots);
          newspotgroup.setAttribute("scale", "1 1 1");
        });
      }
    });
    AFRAME.registerComponent('spot', {
      schema: {
        linkto: {
          type: "string",
          default: ""
        },
        spotgroup: {
          type: "string",
          default: ""
        }
      },
      init: function() {

        //add image source of hotspot icon
        this.el.setAttribute("src", "#hotspot");
        //make the icon look at the camera all the time
        this.el.setAttribute("look-at", "#cam");

        var data = this.data;

        this.el.addEventListener('click', function() {
          //set the skybox source to the new image as per the spot
          var sky = document.getElementById("skybox");
          sky.setAttribute("src", data.linkto);

          var spotcomp = document.getElementById("spots");
          var currspots = this.parentElement.getAttribute("id");
          //create event for spots component to change the spots data
          spotcomp.emit('reloadspots', {
            newspots: data.spotgroup,
            currspots: currspots
          });
        });
      }
    });
  </script>
</head>

<body>
  <a-scene background="color: #ECECEC">
    <a-assets>
      <!-- here we load our 360 images and assign and id -->
      <img id="point1" src="RDC/entre.jpg" />
      <img id="point2" src="RDC/gauche.jpg" />
      <img id="point3" src="RDC/milieugauche.jpg" />
      <img id="point4" src="RDC/fondgauche.jpg" />
      <img id="point5" src="RDC/fondgauche2.jpg" />
      <img id="point6" src="RDC/couloirfond.jpg" />
      <img id="point7" src="RDC/8.jpg" />
      <img id="point8" src="RDC/6.jpg" />
      <img id="point9" src="RDC/9.jpg" />
      <img id="point10" src="RDC/Entree2.jpg" />

      <!-- here we load the location icon we want to use and assign the id = "hotspot " -->
      <img grabbable id="hotspot" src="https://cdn.glitch.com/5785f504-b035-426e-890b-7831a289e96c%2Flocation05.gif?v=1589236533619" />
    </a-assets>

    <!-- Link 360 images to hotspots -->
    <a-entity id="leftHand" hand-controls="hand: left; handModelStyle: toon; color: #ffcccc"></a-entity>

    <a-entity laser-controls="hand:right;color:red;" raycaster="lineColor: red; lineOpacity: 0.5"></a-entity>

    <a-entity id="spots" hotspots>
      <a-entity id="group-point1">
        <a-image spot="linkto:#point2;spotgroup:group-point2" position="10 2 -2"></a-image>
      </a-entity>
      <a-entity id="group-point2" scale="0 0 0">
        <a-image spot="linkto:#point1;spotgroup:group-point1" position="6 2 -10"></a-image>
        <a-image spot="linkto:#point3;spotgroup:group-point3" position="-10 2 2"></a-image>
      </a-entity>
      <a-entity id="group-point3" scale="0 0 0">
        <a-image spot="linkto:#point2;spotgroup:group-point2" position="6 2 -10"></a-image>
        <a-image spot="linkto:#point4;spotgroup:group-point4" position="-5 2 6"></a-image>
        <a-image spot="linkto:#point10;spotgroup:group-point10" position="-8 2 2"></a-image>
      </a-entity>
      <a-entity id="group-point4" scale="0 0 0">
        <a-image spot="linkto:#point3;spotgroup:group-point3" position="1 2 -5"></a-image>
        <a-image spot="linkto:#point5;spotgroup:group-point5" position="-1 2 6"></a-image>
      </a-entity>
      <a-entity id="group-point5" scale="0 0 0">
        <a-image spot="linkto:#point4;spotgroup:group-point4" position="5 2 -2"></a-image>
        <a-image spot="linkto:#point6;spotgroup:group-point6" position="-2 2 -6"></a-image>
      </a-entity>
      <a-entity id="group-point6" scale="0 0 0">
        <a-image spot="linkto:#point5;spotgroup:group-point5" position="-8 2 0"></a-image>
        <a-image spot="linkto:#point7;spotgroup:group-point7" position="0 2 6"></a-image>
      </a-entity>
      <a-entity id="group-point7" scale="0 0 0">
        <a-image spot="linkto:#point6;spotgroup:group-point6" position="6 2 4"></a-image>
        <a-image spot="linkto:#point8;spotgroup:group-point8" position="-6 2 2"></a-image>
      </a-entity>
      <a-entity id="group-point8" scale="0 0 0">
        <a-image spot="linkto:#point7;spotgroup:group-point7" position="5 2 7"></a-image>
        <a-image spot="linkto:#point9;spotgroup:group-point9" position="5 2 -7"></a-image>
      </a-entity>
      <a-entity id="group-point9" scale="0 0 0">
        <a-image spot="linkto:#point8;spotgroup:group-point8" position="-5 2 7"></a-image>
      </a-entity>
      <a-entity id="group-point10" scale="0 0 0">
        <a-image spot="linkto:#point3;spotgroup:group-point3" position="5 2 -2"></a-image>
      </a-entity>
    </a-entity>

    <!-- Define the starting image of the tour-->
    <a-sky id="skybox" src="#point1"></a-sky>

    <!-- Camera and cursor -->
    <a-entity id="cam" camera position="0 1.6 0" look-controls gamepad-controls>
    </a-entity>

  </a-scene>
</body>

</html>