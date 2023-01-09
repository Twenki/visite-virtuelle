<?php
session_start();
include '../admin/database.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visite virtuelle - Batiment Abel de Pujol 1</title>
    <link rel="stylesheet" href="../css/visite.css">
</head>


<body>
    <!-- Barre de tache en bas de l'écran -->


    <!-- Page qui s'affiche lorque que l'on clique sur un point info -->
    <div id="Infrarouge" style="display: none;" onclick="Infrarouge();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="4"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="4"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="4"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>

    <div id="fluo" style="display: none;" onclick="fluo();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="5"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="5"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="5"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>

    <div id="absorption" style="display: none;" onclick="absorption();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="6"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="6"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="6"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>


    <div id="information" style="display: none;" onclick="information();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="7"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="7"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>



    <script>
        function ChangeDrapeau() {
            var image = document.getElementById('drapeau');
            if (image.src == "http://localhost/stage2022/textures/drapeau_fr.png") {
                image.src = "http://localhost/stage2022/textures/drapeau_en.png";
            } else {
                image.src = "http://localhost/stage2022/textures/drapeau_fr.png"
            }
        }

        //Change d'etage sur la map en 3D
        function changeImage() {
            var image = document.querySelector("image")
            if (image.href.animVal == 'rdc.png') {
                image.setAttribute('href', "etage1.png");
                document.getElementById("etage1").style.display = 'block';
                document.getElementById("etage2").style.display = 'none';
                document.getElementById("hall").style.display = 'none';

            } else if (image.href.animVal == 'etage1.png') {
                image.setAttribute('href', "etage2.png");
                document.getElementById("etage2").style.display = 'block';
                document.getElementById("etage1").style.display = 'none';
            } else {
                image.setAttribute('href', "rdc.png")
                document.getElementById("hall").style.display = 'block';
                document.getElementById("etage1").style.display = 'none';
                document.getElementById("etage2").style.display = 'none';

            }

        }

        //Appartition de la carte du campus
        function maFonction() {
            var div = document.getElementById("maDIV");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        //Apparition de la map du batiment en 3D
        function openmap() {
            var div = document.getElementById("minimap");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

        function arrowUp() {
            var div = document.getElementById("arrowUp");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function Infrarouge() {
            var div = document.getElementById("Infrarouge");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function fluo() {
            var div = document.getElementById("fluo");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

        function absorption() {
            var div = document.getElementById("absorption");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function information() {
            var div = document.getElementById("information");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function Layer() {
            var div = document.getElementById("layer");
            if (div.style.display === "fixed") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function logoInsa() {
            var div = document.getElementById("logoinsa");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
    </script>
    <div id="tooltip"></div>
    <canvas id="world"></canvas>

    <script src="../three.js"></script>
    <script src="../TweenLite.js"></script>
    <script src="../SpriteMixer.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/EaselPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/CustomEase.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

    <script type="importmap">
        {
    "imports": {
      "three": "https://unpkg.com/three/build/three.module.js"
    }
  }
</script>

    <script type="module">
        import * as THREE from 'three';
        import {
            VRButton
        } from 'https://unpkg.com/three/examples/jsm/webxr/VRButton.js';
        import {
            XRControllerModelFactory
        } from 'https://unpkg.com/three/examples/jsm/webxr/XRControllerModelFactory.js';


        let camera, scene, renderer, sphere, clock;
        let raycaster;
        var delta, spriteMixer, actionSprite, running;
        var actions = {};
        const WIDTH = window.innerWidth;
        const HEIGHT = window.innerHeight;
        const container = document.body
        const tooltip = document.querySelector('#tooltip')
        let spriteActive = false
        var controller1, controller2;
        var controllerGrip1, controllerGrip2;
        spriteMixer = SpriteMixer();


        class Scene {

            constructor(image, camera) {
                this.image = image
                this.points = []
                this.sprites = []
                this.scene = null
                this.camera = camera
            }

            //Création de la scène
            createScene(scene) {
                this.scene = scene
                const geometry = new THREE.SphereGeometry(11, 32, 32)
                const texture = new THREE.TextureLoader().load(this.image)
                texture.wrapS = THREE.RepeatWrapping
                texture.repeat.x = -1
                texture.minFilter = THREE.LinearFilter;
                const material = new THREE.MeshBasicMaterial({
                    map: texture,
                    side: THREE.DoubleSide
                })
                material.transparent = true

                this.sphere = new THREE.Mesh(geometry, material)
                this.scene.add(this.sphere)
                this.points.forEach(this.addTooltip.bind(this))
            }

            addPoint(point) {
                this.points.push(point)
            }

            //Création du tooltip
            addTooltip = function(point) {

                var loader = new THREE.TextureLoader();
                let spriteMap = loader.load('../textures/' + point.image, (texture) => {
                    actionSprite = spriteMixer.ActionSprite(texture, 4, 6);
                    actionSprite.setFrame(0);
                    actions.runLeft = spriteMixer.Action(actionSprite, 0, 20, 50);
                    actions.runLeft.playLoop()
                    actionSprite.scale.set(5, 3, 5);
                    let spriteMaterial = new THREE.SpriteMaterial({
                        map: spriteMap
                    })
                    let sprite = new THREE.Sprite(spriteMaterial)
                    sprite.name = point.name;
                    sprite.position.copy(point.position.clone().normalize().multiplyScalar(10));
                    sprite.scale.multiplyScalar(2)
                    this.scene.add(sprite);
                    this.sprites.push(sprite);
                    if (point.scene !== false) {
                        sprite.onClick = () => {
                            this.destroy();
                            setTimeout(() => {
                                point.scene.createScene(scene);
                            }, 1500);
                            point.scene.appear();

                        }
                    } else {
                        sprite.onClick = () => {}
                    }
                })

            }

            //Destruction des tooltip/scene a chaque changement de scene
            destroy = function() {
                actions.runLeft.stop();

                this.sprites.forEach((sprite) => {

                    this.sprites.forEach((sprite) => {
                        TweenLite.to(sprite.scale, 1, {
                            x: 0,
                            y: 0,
                            z: 0,
                            onComplete: () => {
                                this.scene.remove(sprite)
                            }
                        })
                    })
                })
            }

            //Apparition des nouveaux point de scene
            appear() {
                this.sprites.forEach((sprite) => {
                    sprite.scale.set(0, 0, 0)
                    TweenLite.to(sprite.scale, 1, {
                        x: 1,
                        y: 3,
                        z: 3
                    })
                })

            }
        }



        window.addEventListener('load', () => {
            init();
            loop();
        })


        function init() {
            scene = new THREE.Scene();

            camera = new THREE.PerspectiveCamera(80, WIDTH / HEIGHT, 1, 50);

            renderer = new THREE.WebGLRenderer({
                canvas: document.querySelector('#world'),
                antialias: false,
                powerPreference: "high-performance",
            });
            renderer.setSize(window.innerWidth, window.innerHeight)
            renderer.setPixelRatio(window.devicePixelRatio * 0.95);
            renderer.setClearColor(0xffffff, 0);

            document.body.appendChild(VRButton.createButton(renderer));
            clock = new THREE.Clock();


            let s = new Scene('RDC/Entre.jpg', camera)
            let sHall = new Scene('RDC/hallPrincipal.jpg', camera)

            //Point sur les scène
            s.addPoint({
                position: new THREE.Vector3(8.153311159977697, -0.23087855226474052, -7.303276276637954),
                name: '',
                scene: sHall,
                image: 'rond.png'
            })
            sHall.addPoint({
                position: new THREE.Vector3(-10.468942480245712, -1.467960149500938, -2.8200827216367097),
                name: '',
                scene: s,
                image: 'rond.png'
            })
            s.createScene(scene)
            s.appear()

            window.hall = function() {
                sHall.createScene(scene)
            }

            renderer.xr.enabled = true;
            renderer.setAnimationLoop(function() {
                renderer.render(scene, camera);
            });

            const tempMatrix = new THREE.Matrix4();

            function onSelectStart(event) {
                console.log("fdsf")
                const controller = event.target;
                const rayCaster = new THREE.Raycaster()
                hall()

                
            }

            

            function getIntersections(controller) {

                tempMatrix.identity().extractRotation(controller.matrixWorld);

                raycaster.ray.origin.setFromMatrixPosition(controller.matrixWorld);
                raycaster.ray.direction.set(0, 0, -1).applyMatrix4(tempMatrix);

                return raycaster.intersectObjects(group.children, false);



            }

            function intersectObjects(controller) {

                if (controller.userData.selected !== undefined) return;

                const line = controller.getObjectByName('line');
                const intersections = getIntersections(controller);

            }

            function render() {

                cleanIntersected();

                intersectObjects(controller1);
                intersectObjects(controller2);

                renderer.render(scene, camera);

            }


            controller1 = renderer.xr.getController(0);
            controller1.addEventListener('selectstart', onSelectStart);
            controller1.addEventListener('selectend', onSelectEnd);
            scene.add(controller1);

            controller2 = renderer.xr.getController(1);
            controller2.addEventListener('selectstart', onSelectStart);
            controller2.addEventListener('selectend', onSelectEnd);
            scene.add(controller2);

            const controllerModelFactory = new XRControllerModelFactory();

            controllerGrip1 = renderer.xr.getControllerGrip(0);
            controllerGrip1.add(controllerModelFactory.createControllerModel(controllerGrip1));
            scene.add(controllerGrip1);

            controllerGrip2 = renderer.xr.getControllerGrip(1);
            controllerGrip2.add(controllerModelFactory.createControllerModel(controllerGrip2));
            scene.add(controllerGrip2);

            const geometry = new THREE.BufferGeometry().setFromPoints([new THREE.Vector3(0, 0, 0), new THREE.Vector3(0, 0, -1)]);

            const line = new THREE.Line(geometry);
            line.name = 'line';
            line.scale.z = 5;

            controller1.add(line.clone());
            controller2.add(line.clone());




            renderer.setSize(window.innerWidth, window.innerHeight)
            container.appendChild(renderer.domElement)

            function onResize() {
                renderer.setSize(window.innerWidth, window.innerHeight)
                camera.aspect = window.innerWidth / window.innerHeight
                camera.updateProjectionMatrix()
            }

            const rayCaster = new THREE.Raycaster()

            function onClick(e) {

                let mouse = new THREE.Vector2(
                    (e.clientX / window.innerWidth) * 2 - 1,
                    -(e.clientY / window.innerHeight) * 2 + 1

                )

                rayCaster.setFromCamera(mouse, camera)
                let intersects = rayCaster.intersectObjects(scene.children)

                intersects.forEach(function(intersect) {
                    if (intersect.object.type === 'Sprite') {

                        intersect.object.onClick()
                        if (spriteActive) {
                            tooltip.classList.remove('is-active')
                            spriteActive = false
                        }
                    }

                    //Si on clique sur l'objet avec le nom correspondant, active la fonction qui correspond
                    if (intersect.object.name === "spectrophometre infrarouge") {
                        intersect.object.onClick()
                        Infrarouge()
                    }
                    if (intersect.object.name === "spectrophometre a fluorescence X") {
                        intersect.object.onClick()
                        fluo()
                    }
                    if (intersect.object.name === "spectrophometre a absorption atomique") {
                        intersect.object.onClick()
                        absorption()
                    }
                    if (intersect.object.name === "Information") {
                        intersect.object.onClick()
                        information()
                    }

                })

                intersects = rayCaster.intersectObject(s.sphere)
                if (intersects.length > 0) {
                    console.log(intersects[0].point)

                }
                let intersectes = rayCaster.intersectObjects(scene.children)
                intersects.forEach(function(intersect) {
                    if (intersectes[0].object.type == "Sprite") {
                        gsap.to(camera.position, {
                            x: -intersectes[0].object.position.x,
                            y: 0,
                            z: -intersectes[0].object.position.z,
                            duration: 1.5,
                            ease: "power4.inOut",
                        })
                    }
                })

            }

            function onMouseMove(e) {
                let mouse = new THREE.Vector2(
                    (e.clientX / window.innerWidth) * 2 - 1,
                    -(e.clientY / window.innerHeight) * 2 + 1
                )
                rayCaster.setFromCamera(mouse, camera)
                let foundSprite = false
                let intersects = rayCaster.intersectObjects(scene.children)
                intersects.forEach(function(intersect) {
                    if (intersect.object.name != '') {
                        let p = intersect.object.position.clone().project(camera)
                        tooltip.style.top = ((-1 * p.y + 1) * window.innerHeight / 2) + 'px'
                        tooltip.style.left = ((p.x + 1) * window.innerWidth / 2) + 'px'
                        tooltip.classList.add('is-active')
                        //Texte dans le tooltip
                        tooltip.innerHTML = intersect.object.name;
                        spriteActive = intersect.object
                        foundSprite = true
                    }
                })
                if (foundSprite) {
                    container.classList.add('hover')
                } else {
                    container.classList.remove('hover')
                }
                if (foundSprite === false && spriteActive) {
                    tooltip.classList.remove('is-active')
                    spriteActive = false
                }
            }

            window.addEventListener('resize', onResize)

            container.addEventListener('click', onClick)
            container.addEventListener('mousemove', onMouseMove)

        };

        function loop() {
            requestAnimationFrame(loop);
            renderer.render(scene, camera);
            renderer.setAnimationLoop(function() {
                renderer.render(scene, camera);
            });
            delta = clock.getDelta();
            spriteMixer.update(delta);

            if (running == 'right') {
                actionSprite.position.x += 0.05;
            }

        };


        //Fonction plein ecran
        function fullscreen(elem) {
            elem = elem || document.documentElement;
            if (!document.fullscreenElement && !document.mozFullScreenElement &&
                !document.webkitFullscreenElement && !document.msFullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }
    </script>

</body>

</html>