<?php
session_start();
include '../admin/database.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Visite virtuelle - Batiment Demonstrateur</title>
    <link rel="stylesheet" href="../css/visite.css">
</head>


<body>
    <!-- Barre de tache en bas de l'écran -->
    <div class="container">
        <div class="toolbar">
            <a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
            <a href="#"><img src="../ressources/iconmap.png" alt="Map" onclick="maFonction(); logoInsa();"></a>
            <a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap();"></a>
            <img src="../textures/dyslexie.png" id="OpenDys" class="switch-font">
            <a href="#"><img src="../textures/fullscreenon.png" name="FullScreen" onclick="fullscreen();"></a>
            <hr />
        </div>
    </div>

    <!-- Page qui s'affiche a chaque entrée de batiment -->
    <div onclick="Layer();logoInsa();">
        <img id="layer" src="layer.png" alt="">
    </div>

    <!-- Logo Insa en haut a gauche -->
    <div id="logoinsa" style="display: none;">
        <a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
    </div>

    <!-- Page qui s'affiche lorque que l'on clique sur un point info -->
    <div id="PosterCEBD" style="display: none;" onclick="PosterCEBD();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="1"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="2"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>

    <div id="Cuve" style="display: none;" onclick="Cuve();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="2"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="1"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>

    <div id="Thermique" style="display: none;" onclick="Thermique();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="3"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div class="zoom">
                <?php
                $recupImg = $bdd->query('SELECT * FROM images WHERE id="3"');
                while ($donnees = $recupImg->fetch()) {
                    echo ('<img style="width:80%" src ="' . $donnees['nom'] . '"/>');
                }
                ?>
            </div>
        </div>
    </div>

    <!--Creation des zone cliquable dans la map en 3D-->
    <!--<img src="cebd.png" alt="Map" title="Map" usemap="#cebd" id="minimap" style="display: none;" onclick="openmap();" />
    <map name="cebd">
        <area onclick="travail()" shape="poly" coords="494,319,774,314,749,570,445,565" alt="travail" style="display: none;" />
        <area onclick="machine();" coords="537,109,494,312,771,315,788,112" shape="poly" style="display: none;">
        <area onclick="neutre()" shape="poly" coords="1125,322,1136,514,1443,515,1407,319" alt="neutre" style="display: none;" />
        <area onclick="p1950()" shape="poly" coords="1146,626,1473,631,1517,885,1166,883" alt="p1950" style="display: none;" />
    </map>
            !-->
    <svg id="minimap" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap();">
        <image width="1920" height="1080" xlink:href="cebd.png"></image> <a xlink:href="#">
            <rect x="497" y="109" fill="#fff" opacity="0" width="290" height="200" onclick="machine();"></rect>
        </a><a xlink:href="#">
            <rect x="451" y="315" fill="#fff" opacity="0" width="319" height="251" onclick="travail();"></rect>
        </a><a xlink:href="#">
            <rect x="1128" y="320" fill="#fff" opacity="0" width="311" height="194" onclick="neutre();"></rect>
        </a><a xlink:href="#">
            <rect x="1149" y="631" fill="#fff" opacity="0" width="366" height="255" onclick="p1950();"></rect>
        </a>
    </svg>

    <!-- Grande carte du campus -->
    <div id="maDIV" style="display: none; ">
        <div class="mapAndInfos">
            <div class="map">
                <?php include('../ressources/map.svg'); ?>
            </div>

            <div class="Infos">
                <span id="infosRegion"></span>
            </div>
        </div>
    </div>



    <script>
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

        function PosterCEBD() {
            var div = document.getElementById("PosterCEBD");
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

        function Cuve() {
            var div = document.getElementById("Cuve");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

        function Thermique() {
            var div = document.getElementById("Thermique");
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

    <script>
        $(function() {
            $('[id*=region_').on('click', function() {

                let region = $(this);
                let regionId = $(this)["0"].id;
                let allRegion = $('[id*=region_')

                allRegion.css('fill', '#a0a0a0a0')
                region.css('fill', '#aa1d1d')
                setTimeout(
                    function() {
                        if (regionId == "region_cebd") {
                            window.location = '../demonstrateur/demonstrateur.php';
                        } else if (regionId == "region_ab1")
                            window.location = '../ap1/ab1.php';

                        else if (regionId == "region_ab2")
                            window.location = '../ap2/ab2.php';

                        else if (regionId == "region_ab3")
                            window.location = '../ap3/ab3.php';

                        else if (regionId == "region_cl1")
                            window.location = '../cl1/cl1.php';

                        else if (regionId == "region_cl3")
                            window.location = '../cl1/cl1.php';

                        else if (regionId == "region_carpeaux")
                            window.location = '../cpx/cpx.php';

                        else if (regionId == "region_gymnase")
                            window.location = '../gym/gym.php';

                        else if (regionId == "region_herbin")
                            window.location = '../her/her.php';

                        else if (regionId == "region_lottman")
                            window.location = '../lot/lot.php';
                    }, 1000);
                console.log(regionId);
            });
            $("#OpenDys").click(function() {
                $("div").toggleClass("OpenDys-font");
                $("#containerInfo").toggleClass("containerInfo");
            });
        })
    </script>

    <script>
        var scene, camera, renderer;
        var clock, delta, spriteMixer, actionSprite, running;
        var actions = {};
        const WIDTH = window.innerWidth;
        const HEIGHT = window.innerHeight;
        const container = document.body
        const tooltip = document.querySelector('#tooltip')
        let spriteActive = false
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
                scene.background = null;
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
            addTooltip(point) {
                var loader = new THREE.TextureLoader();
                loader.minFilter = THREE.LinearFilter;
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
                                TweenLite.to(this.sphere.material, 1, {
                                    opacity: 0,
                                    onComplete: () => {
                                        this.scene.remove(this.sphere)
                                    }
                                })
                            }, 1300);
                            point.scene.appear();
                        }
                    } else {
                        sprite.onClick = () => {}
                    }
                })
                //Creation du cache misère en dessous de la caméra
                var geometry = new THREE.CircleGeometry(3, 50);
                var material = new THREE.MeshBasicMaterial({
                    map: new THREE.TextureLoader().load('../ressources/insa.png')
                });
                var plane = new THREE.Mesh(geometry, material);
                plane.material.side = THREE.DoubleSide;
                scene.add(plane);
                plane.position.x = 0;
                plane.position.y = -6;
                plane.position.z = 0;

                plane.rotation.x = 30
                plane.rotation.y = 0
                plane.rotation.z = 4.5
                plane.minFilter = THREE.LinearFilter;
            }
            //Destruction des tooltip/scene a chaque changement de scene
            destroy = function(target) {
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
                alpha: true,
                canvas: document.querySelector('#world')
            });
            renderer.setSize(window.innerWidth, window.innerHeight)
            renderer.setClearColor(0xffffff, 0);
            clock = new THREE.Clock();
            const controls = new THREE.OrbitControls(camera)
            controls.maxDistance = 3;
            controls.minDistance = 0.9;
            controls.rotateSpeed = -0.1
            controls.enableZoom = false
            controls.enablePan = false
            controls.autoRotate = true
            controls.autoRotateSpeed = 0.1
            controls.enableDamping = true;
            controls.dampingFactor = 0.3;
            camera.position.set(-1, 0, 0)
            controls.update()


            let s = new Scene('entreExt.jpg', camera)
            let sCouloir = new Scene('Couloir.jpg', camera)
            let sPiece1960 = new Scene('Piece1960.jpg', camera)
            let sPieceNeutre = new Scene('PieceNeutre.jpg', camera)
            let sPieceTravail = new Scene('PieceTravail.jpg', camera)
            let sChaufferie = new Scene('Chaufferie.jpg', camera)

            s.addPoint({
                position: new THREE.Vector3(4.714811314699234, -3.114821546821535, 9.380237556534915),
                name: '',
                scene: sCouloir,
                image: 'rond.png',

            })
            sCouloir.addPoint({
                position: new THREE.Vector3(-8.660610853846034, -6.715441944110369, -0.3804613787982652),
                name: '',
                scene: s,
                image: 'rond.png',
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(10.535233962463256, -0.6621711164018684, 2.869830592984276),
                name: 'Poster CEBD',
                scene: false,
                image: 'info.png',
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(-7.389313087924291, -4.415032982159773, 6.78599397250551),
                name: 'Piece 1950',
                scene: sPiece1960,
                image: 'door.png',
            })
            sPiece1960.addPoint({
                position: new THREE.Vector3(-5.570224668840283, -5.739098852586877, 7.490725855337145),
                name: '',
                scene: sCouloir,
                image: 'rond.png',
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(8.343917713130864, 0.09355180944703029, 7.08160470909292),
                name: 'Piece Neutre',
                scene: sPieceNeutre,
                image: 'door.png',
            })
            sPieceNeutre.addPoint({
                position: new THREE.Vector3(-6.5562283487593165, -7.8602148965285785, 3.963882804259067),
                name: '',
                scene: sCouloir,
                image: 'rond.png',
            })
            sPieceNeutre.addPoint({
                position: new THREE.Vector3(8.54507770361718, 0.5472882001211435, -6.801522771452184),
                name: 'Confort Thermique',
                scene: false,
                image: 'info.png',
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(10.57716825956083, -1.0996817073390122, -2.6505950244517336),
                name: 'Piece Travail',
                scene: sPieceTravail,
                image: 'door.png',
            })
            sPieceTravail.addPoint({
                position: new THREE.Vector3(9.592159609940417, -0.6553499398259863, -5.208907942425214),
                name: '',
                scene: sCouloir,
                image: 'arrowleft.png',
            })
            sPieceTravail.addPoint({
                position: new THREE.Vector3(10.867750411767215, 0.09299240019339444, 1.2963685767321131),
                name: 'Salle des machine',
                scene: sChaufferie,
                image: 'door.png',
            })
            sChaufferie.addPoint({
                position: new THREE.Vector3(-10.899576658346454, -0.9351672898430617, 0.5531595274600902),
                name: 'Salle Travail',
                scene: sPieceTravail,
                image: 'door.png',
            })
            sChaufferie.addPoint({
                position: new THREE.Vector3(4.1188147193922795, 0.5540875241568686, -10.161881001651585),
                name: 'Cuve',
                scene: false,
                image: 'info.png',
            })

            s.createScene(scene)
            s.appear()


            //Desactivation de tout les point quand on utilise la carte en 3D
            window.couloir = function() {
                sCouloir.createScene(scene)
                s.destroy()
                sCouloir.destroy()
                sPiece1960.destroy()
                sPieceNeutre.destroy()
                sPieceTravail.destroy()
                sChaufferie.destroy()
            }
            window.travail = function() {
                sPieceTravail.createScene(scene)
                s.destroy()
                sPieceTravail.destroy()
                sPiece1960.destroy()
                sPieceNeutre.destroy()
                sCouloir.destroy()
                sChaufferie.destroy()
            }
            window.machine = function() {
                sChaufferie.createScene(scene)
                s.destroy()
                sChaufferie.destroy()
                sPiece1960.destroy()
                sPieceNeutre.destroy()
                sCouloir.destroy()
                sPieceTravail.destroy()
            }
            window.neutre = function() {
                sPieceNeutre.createScene(scene)
                s.destroy()
                sPieceNeutre.destroy()
                sPiece1960.destroy()
                sChaufferie.destroy()
                sCouloir.destroy()
                sPieceTravail.destroy()
            }
            window.p1950 = function() {
                sPiece1960.createScene(scene)
                s.destroy()
                sPiece1960.destroy()
                sPieceNeutre.destroy()
                sChaufferie.destroy()
                sCouloir.destroy()
                sPieceTravail.destroy()
            }

            renderer.setSize(window.innerWidth, window.innerHeight)
            container.appendChild(renderer.domElement)

            function animate() {
                requestAnimationFrame(animate)
                renderer.render(scene, camera)
                controls.update();
            }

            animate()

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
                    if (intersect.object.name === "Poster CEBD") {
                        intersect.object.onClick()
                        PosterCEBD()
                    }
                    if (intersect.object.name === "Cuve") {
                        intersect.object.onClick()
                        Cuve()
                    }
                    if (intersect.object.name === "Confort Thermique") {
                        intersect.object.onClick()
                        Thermique()
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