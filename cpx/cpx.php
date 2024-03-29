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
    <title>Visite virtuelle - Batiment Demonstrateur</title>
    <link rel="stylesheet" href="../css/visite.css">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HYLJZEMJB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7HYLJZEMJB');
</script>

<body>
    <nav>
        <ul>
            <img src="RDC/hallamphi.jpg" style="width: 10%;" onclick="etage1()">
            <img src="1ETAGE/entrestaps.jpg" style="width: 10%;" onclick="rdchall()">
            <img src="SS/couloiresca.jpg" style="width: 10%;" onclick="soussol()">
        </ul>
    </nav>
    <!-- Barre de tache en bas de l'écran -->
    <div class="container">
        <div class="toolbar">
            <a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
            <a href="#"><img src="../ressources/iconmap.png" alt="Map" onclick="maFonction(); logoInsa();"></a>
            <a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap(); arrowUp();"></a>
            <img src="../textures/dyslexie.png" id="OpenDys" class="switch-font">
            <a href="#"><img src="../textures/fullscreenon.png" name="FullScreen" onclick="fullscreen();"></a>
            <hr />
        </div>
    </div>

    <div id="logo">
        <img src="tp/etage1.png" style="width: 100%;" onclick="etage1()">
        <img src="tp/rdc.png" style="width: 100%;" onclick="rdchall()">
        <img src="tp/soussol.png" style="width: 100%;" onclick="soussol()">
    </div>

    <!-- Page qui s'affiche a chaque entrée de batiment -->
    <div onclick="Layer();logoInsa();">
        <img id="layer" src="layer.jpg" alt="">
    </div>

    <!-- Logo Insa en haut a gauche -->
    <div id="logoinsa" style="display: none;">
        <a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
    </div>

    <div id="information" style="display: none;" onclick="information();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="10"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>

    <div id="premat" style="display: none;" onclick="premat();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="12"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>
    <div id="protool" style="display: none;" onclick="protool();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="13"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>
    <div id="son" style="display: none;" onclick="son();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="14"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>
    <div id="video" style="display: none;" onclick="video();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="15"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>

    <!--
    <map name="map">
        <area onclick="rdchall();" shape="poly" coords="150,20,171,19,163,25,160,44,217,46,216,66,200,67,198,129,185,129,187,66,143,65" alt="Couloir" style="display: none;" />
        <area onclick="etage1();" shape="poly" coords="207,34,238,33,245,98,197,99,195,130,158,129,160,96,181,96,182,84,207,83" alt="Couloir" style="display: none;" />
        <area onclick="soussol();" shape="poly" coords="120,50,107,150,322,150,310,101,247,100,252,130,171,133,168,106,140,103,141,47" alt="Couloir" style="display: none;" />
    </map>
-->

    <svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
        <image width="1920" height="1080" xlink:href="rdc.png"></image>
    </svg>
    <img src="../textures/arrowup.png" id="arrowUp" onclick="changeImage()" style="display: none;" />

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
        function ChangeDrapeau() {
            var image = document.getElementById('drapeau');
            if (image.src == "http://localhost/stage2022/textures/drapeau_fr.png") {
                image.src = "http://localhost/stage2022/textures/drapeau_en.png";
            } else {
                image.src = "http://localhost/stage2022/textures/drapeau_fr.png"
            }
        }

        function changeImage() {
            var image = document.querySelector("image")
            if (image.href.animVal == 'rdc.png') {
                image.setAttribute('href', "etage1.png");
            } else if (image.href.animVal == 'etage1.png') {
                image.setAttribute('href', "ss.png");
            } else {
                image.setAttribute('href', "rdc.png")
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
        function premat() {
            var div = document.getElementById("premat");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
        function protool() {
            var div = document.getElementById("protool");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
        function son() {
            var div = document.getElementById("son");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
        function video() {
            var div = document.getElementById("video");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

        function maFonction() {
            var div = document.getElementById("maDIV");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }

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

            addTooltip(point) {

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
                                TweenLite.to(this.sphere.material, 1, {
                                    opacity: 0,
                                    onComplete: () => {
                                        this.scene.remove(this.sphere)
                                    }
                                })
                            }, 1500);
                            point.scene.appear();

                        }
                    } else {
                        sprite.onClick = () => {}
                    }
                })

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

            }


            destroy = function() {
                actions.runLeft.stop();

                this.sprites.forEach((sprite) => {
                    TweenLite.to(sprite.scale, 1, {
                        x: 0,
                        y: 0,
                        z: 0,
                        onComplete: () => {
                            globalThis.scene.remove(sprite)
                        }
                    })
                })
            }

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


            let s = new Scene('RDC/entreext.jpg', camera)
            let sInterieur = new Scene('RDC/entreint.jpg', camera)
            let sHallAmphie = new Scene('RDC/hallamphi.jpg', camera)
            let sAmphiCollet = new Scene('RDC/amphicollet.jpg', camera)
            let sAmphiCoquet = new Scene('RDC/amphicoquet.jpg', camera)
            let couloirdirectionstaps = new Scene('1ETAGE/couloirdirectionstaps.jpg', camera)
            let couloirstaps = new Scene('1ETAGE/couloirstaps.jpg', camera)
            let directionstaps = new Scene('1ETAGE/directionstaps.jpg', camera)
            let escastaps = new Scene('1ETAGE/escastaps.jpg', camera)
            let entrestaps = new Scene('1ETAGE/entrestaps.jpg', camera)
            let salleteam = new Scene('1ETAGE/salleteam.jpg', camera)

            s.addPoint({
                position: new THREE.Vector3(10.191504275408748, -3.4323133586945045, -2.1972452461558456),
                name: '',
                scene: sInterieur,
                image: 'rond.png'
            })
            sInterieur.addPoint({
                position: new THREE.Vector3(10.643205230773958, -1.9211384503982143, 1.815251053755759),
                name: '',
                scene: s,
                image: 'rond.png'
            })

            sHallAmphie.addPoint({
                position: new THREE.Vector3(-9.586164588773931, -3.7280349354978743, -3.8300309734529776),
                name: '',
                scene: couloirdirectionstaps,
                image: 'rond.png'
            })
            couloirdirectionstaps.addPoint({
                position: new THREE.Vector3(0.06964910391711954, -1.842387787531042, -10.82681390909975),
                name: '',
                scene: directionstaps,
                image: 'rond.png'
            })
            directionstaps.addPoint({
                position: new THREE.Vector3(-6.751039975406627, -2.173091930784513, 8.340273114672902),
                name: '',
                scene: couloirdirectionstaps,
                image: 'rond.png'
            })
            directionstaps.addPoint({
                position: new THREE.Vector3(8.788828764457026, -2.775870610952716, 5.967614882606949),
                name: '',
                scene: escastaps,
                image: 'rond.png'
            })
            escastaps.addPoint({
                position: new THREE.Vector3(-0.9670162552771981, -4.433145827069506, 9.961663733332863),
                name: '',
                scene: directionstaps,
                image: 'rond.png'
            })
            escastaps.addPoint({
                position: new THREE.Vector3(-8.87724083255964, -5.88123660368762, -2.564202644532218),
                name: '',
                scene: entrestaps,
                image: 'rond.png'
            })
            entrestaps.addPoint({
                position: new THREE.Vector3(-8.896754131474493, -4.40958257446285, -4.610414149327728),
                name: '',
                scene: escastaps,
                image: 'rond.png'
            })
            entrestaps.addPoint({
                position: new THREE.Vector3(-10.416329668941932, -0.9318525751947571, 3.2163856024610316),
                name: '',
                scene: salleteam,
                image: 'door.png'
            })
            salleteam.addPoint({
                position: new THREE.Vector3(10.641970022955983, -1.113467442072068, -2.429961472218616),
                name: '',
                scene: entrestaps,
                image: 'door.png'
            })
            couloirdirectionstaps.addPoint({
                position: new THREE.Vector3(-9.806597766723712, -4.758733325479133, -0.9779258997331286),
                name: '',
                scene: sHallAmphie,
                image: 'rond.png'
            })
            sHallAmphie.addPoint({
                position: new THREE.Vector3(3.5419401543680817, 0.26419013122153945, 10.35168480114863),
                name: '',
                scene: sAmphiCollet,
                image: 'door.png'
            })
            sAmphiCollet.addPoint({
                position: new THREE.Vector3(-4.334482264270251, -1.0314080764486626, -10.038702780871347),
                name: '',
                scene: sHallAmphie,
                image: 'rond.png'
            })
            sHallAmphie.addPoint({
                position: new THREE.Vector3(-10.156787853262934, -0.08693232995602107, 4.211515775339934),
                name: '',
                scene: sAmphiCoquet,
                image: 'door.png'
            })
            sAmphiCoquet.addPoint({
                position: new THREE.Vector3(9.889564115233977, 1.7955599137061642, -4.383997923307846),
                name: '',
                scene: sHallAmphie,
                image: 'arrowright.png'
            })

            //CPX / Etage 1

            let sCouloirEsca = new Scene('1ETAGE/couloiresca.jpg', camera)
            let sCouloir = new Scene('1ETAGE/couloir.jpg', camera)
            let sCouloirSuite = new Scene('1ETAGE/couloirsuite.jpg', camera)
            let sSalleInfo = new Scene('1ETAGE/salleinformatique.jpg', camera)

            sInterieur.addPoint({
                position: new THREE.Vector3(-4.291868647275341, -2.9220622355917723, 9.660789956979164),
                name: '',
                scene: sCouloirEsca,
                image: 'rond.png'
            })
            sCouloirEsca.addPoint({
                position: new THREE.Vector3(10.135230768860648, -2.783633313132867, 3.0278049966864438),
                name: '',
                scene: sInterieur,
                image: 'rond.png'
            })
            sCouloirEsca.addPoint({
                position: new THREE.Vector3(-3.6839044989688943, -3.3851119646576304, 9.758094997006355),
                name: '',
                scene: sCouloir,
                image: 'rond.png'
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(0.18966594456114733, -4.499518196117287, 10.006834498576588),
                name: '',
                scene: sCouloirEsca,
                image: 'rond.png'
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(-10.346358717084863, -3.591454074503852, 0.3803664811399465),
                name: '',
                scene: sCouloirSuite,
                image: 'rond.png'
            })
            sCouloirSuite.addPoint({
                position: new THREE.Vector3(-10.334183158773055, -3.3170642368634957, -1.5008102192021293),
                name: '',
                scene: sCouloir,
                image: 'rond.png'
            })
            sCouloirSuite.addPoint({
                position: new THREE.Vector3(10.50664111253645, -3.246732330461332, 0.005315760516988455),
                name: '',
                scene: sHallAmphie,
                image: 'rond.png'
            })
            sHallAmphie.addPoint({
                position: new THREE.Vector3(9.316626345572775, -1.321345688721492, 5.604393274406638),
                name: '',
                scene: sCouloirSuite,
                image: 'rond.png'
            })
            sCouloir.addPoint({
                position: new THREE.Vector3(2.332382289199178, -2.114952347950834, -10.536880832674854),
                name: '',
                scene: sSalleInfo,
                image: 'door.png'
            })
            sSalleInfo.addPoint({
                position: new THREE.Vector3(-7.748378342651395, 0.48079988187125383, 7.772218745161015),
                name: '',
                scene: sCouloir,
                image: 'rond.png'
            })

            //CPX / Sous-Sol

            let sScouloirEsca = new Scene('SS/couloiresca.jpg', camera)
            let sScouloirMixage = new Scene('SS/couloirmixage.jpg', camera)
            let sScouloirPreMat = new Scene('SS/couloirpretmat.jpg', camera)
            let sScouloirRamdam = new Scene('SS/couloirramdam.jpg', camera)
            let sScouloirPlateau = new Scene('SS/couloirplateau.jpg', camera)
            let sSsallePret = new Scene('SS/sallepret.jpg', camera)
            let sSsallePret2 = new Scene('SS/sallepret2.jpg', camera)
            let sSsalleMixage = new Scene('SS/sallemixage.jpg', camera)
            let sRegie = new Scene('SS/regie.jpg', camera)
            let splateauRegie = new Scene('SS/plateauregie.jpg', camera)
            let sCouloirAvantRamdam = new Scene('SS/couloiravantramdam.jpg', camera)
            let sGrandPlateau = new Scene('SS/plateau.jpg', camera)
            let sPlateauCine = new Scene('SS/plateaucine.jpg', camera)

            sInterieur.addPoint({
                position: new THREE.Vector3(-9.926901078792866, -3.6150164452037323, 2.8454095601718166),
                name: '',
                scene: sScouloirEsca,
                image: 'rond.png'
            })
            sScouloirEsca.addPoint({
                position: new THREE.Vector3(4.1777301606158135, -3.584333399797831, 9.487227957914651),
                name: '',
                scene: sScouloirPreMat,
                image: 'rond.png'
            })
            sScouloirPreMat.addPoint({
                position: new THREE.Vector3(10.56235404871919, -2.2353860087415693, 2.0701500847622496),
                name: '',
                scene: sScouloirEsca,
                image: 'rond.png'
            })
            sScouloirEsca.addPoint({
                position: new THREE.Vector3(-3.8488720413588497, -2.9181773804101385, 9.851114472133418),
                name: '',
                scene: sInterieur,
                image: 'rond.png'
            })
            sScouloirEsca.addPoint({
                position: new THREE.Vector3(-10.598378522080193, -2.2624748561254737, 1.6354955005971858),
                name: '',
                scene: sScouloirMixage,
                image: 'rond.png'
            })
            sScouloirMixage.addPoint({
                position: new THREE.Vector3(0.9046778360284724, -2.578332527711921, -10.591239476336414),
                name: '',
                scene: sScouloirEsca,
                image: 'rond.png'
            })
            sScouloirMixage.addPoint({
                position: new THREE.Vector3(-0.6802579364421232, 0.2821741999868782, 10.919138063391742),
                name: '',
                scene: sCouloirAvantRamdam,
                image: 'arrowleft.png'
            })
            sCouloirAvantRamdam.addPoint({
                position: new THREE.Vector3(-6.852941184675751, -1.49019063911028, 8.390622318602881),
                name: '',
                scene: sScouloirMixage,
                image: 'rond.png'
            })
            sCouloirAvantRamdam.addPoint({
                position: new THREE.Vector3(-8.106544369882714, -1.6194126071274826, -7.1690216586157005),
                name: '',
                scene: sScouloirRamdam,
                image: 'rond.png'
            })
            sScouloirRamdam.addPoint({
                position: new THREE.Vector3(-10.152604163779431, -2.3884409155737187, 3.3099014836807363),
                name: '',
                scene: sCouloirAvantRamdam,
                image: 'rond.png'
            })
            sScouloirRamdam.addPoint({
                position: new THREE.Vector3(10.629236743906684, -0.7865013434385225, 2.5390048898407507),
                name: '',
                scene: sScouloirPlateau,
                image: 'rond.png'
            })
            sScouloirPlateau.addPoint({
                position: new THREE.Vector3(10.880142658817523, -1.1705967855240915, -0.539963685617718),
                name: '',
                scene: sScouloirRamdam,
                image: 'rond.png'
            })
            sScouloirPlateau.addPoint({
                position: new THREE.Vector3(-10.749271616333482, -2.2406359731177887, 0.15899670583993075),
                name: '',
                scene: sPlateauCine,
                image: 'rond.png'
            })
            sScouloirPlateau.addPoint({
                position: new THREE.Vector3(0.4944556259452457, 0.9334512770841834, 10.905442821187872),
                name: '',
                scene: sGrandPlateau,
                image: 'rond.png'
            })
            sPlateauCine.addPoint({
                position: new THREE.Vector3(10.53236130228273, -0.9056283428738942, -2.838297099309398),
                name: '',
                scene: sScouloirPlateau,
                image: 'rond.png'
            })
            sGrandPlateau.addPoint({
                position: new THREE.Vector3(-1.481777325078119, -2.918654276941613, -10.44915457960327),
                name: '',
                scene: sScouloirPlateau,
                image: 'rond.png'
            })

            sScouloirPreMat.addPoint({
                position: new THREE.Vector3(-1.089279179228074, 2.5809996454185016, -10.572389710251707),
                name: '',
                scene: sSsallePret,
                image: 'door.png'
            })
            sScouloirPreMat.addPoint({
                position: new THREE.Vector3(10.012140317505917, 1.1522456304009803, 4.356133766777102),
                name: '',
                scene: sRegie,
                image: 'door.png'
            })
            sRegie.addPoint({
                position: new THREE.Vector3(2.4081401641264923, -3.956048599428005, 9.932644977995738),
                name: '',
                scene: sScouloirPreMat,
                image: 'rond.png'
            })
            sRegie.addPoint({
                position: new THREE.Vector3(-6.846449423672041, -0.09238222743851227, 8.536978616979122),
                name: '',
                scene: splateauRegie,
                image: 'door.png'
            })
            splateauRegie.addPoint({
                position: new THREE.Vector3(8.643934251857422, -0.17608847979388825, -6.709672849842383),
                name: '',
                scene: sRegie,
                image: 'door.png'
            })
            splateauRegie.addPoint({
                position: new THREE.Vector3(8.571812446924469, -1.3526890239859701, 6.6641566150563385),
                name: '',
                scene: sScouloirPreMat,
                image: 'door.png'
            })
            sSsallePret.addPoint({
                position: new THREE.Vector3(-10.889053091974601, -0.9374128157253976, 0.6588869505219618),
                name: '',
                scene: sScouloirPreMat,
                image: 'rond.png'
            })
            sSsallePret.addPoint({
                position: new THREE.Vector3(8.802104313619473, -2.5493757483744943, 6.040438348265259),
                name: '',
                scene: sSsallePret2,
                image: 'rond.png'
            })
            sSsallePret2.addPoint({
                position: new THREE.Vector3(-6.351914641423018, -4.650956806449431, -7.60189830560512),
                name: '',
                scene: sSsallePret,
                image: 'rond.png'
            })
            sScouloirMixage.addPoint({
                position: new THREE.Vector3(-10.81888222706838, 1.4362722255892126, -0.7618218185341114),
                name: '',
                scene: sSsalleMixage,
                image: 'door.png'
            })
            sSsalleMixage.addPoint({
                position: new THREE.Vector3(4.378546623699027, -5.399837019536167, 8.461590471908421),
                name: '',
                scene: sScouloirMixage,
                image: 'rond.png'
            })

            s.addPoint({
                position: new THREE.Vector3(10.491757224648467, -2.7919607827147943, 1.3714323252472587),
                name: 'Information',
                scene: false,
                image: 'panneau.png'
            })

            sScouloirPreMat.addPoint({
                position: new THREE.Vector3(0.21853079316463273, 6.905363515117462, -8.535704278067913),
                name: 'Pret materiel',
                scene: false,
                image: 'info.png'
            })
            sScouloirMixage.addPoint({
                position: new THREE.Vector3(-10.341939552601076, 3.5723378849360365, -0.4946789315892256),
                name: 'Pro Tools',
                scene: false,
                image: 'info.png'
            })
            sScouloirPlateau.addPoint({
                position: new THREE.Vector3(-10.904689668304238, 1.2197868123913729, 0.21665012251294058),
                name: 'Plateau son',
                scene: false,
                image: 'info.png'
            })
            sScouloirPlateau.addPoint({
                position: new THREE.Vector3(-1.740410500764445, 1.282282549884572, 10.745341825342274),
                name: 'Plateau video',
                scene: false,
                image: 'info.png'
            })


            s.createScene(scene)
            s.appear()

            window.rdchall = function() {
                entrestaps.createScene(scene)
                s.destroy()
                sInterieur.destroy()
                sHallAmphie.destroy()
                sAmphiCollet.destroy()
                sAmphiCoquet.destroy()
                couloirdirectionstaps.destroy()
                couloirstaps.destroy()
                directionstaps.destroy()
                escastaps.destroy()
                entrestaps.destroy()
                salleteam.destroy()
                sCouloirEsca.destroy()
                sCouloir.destroy()
                sCouloirSuite.destroy()
                sSalleInfo.destroy()
                sScouloirEsca.destroy()
                sScouloirMixage.destroy()
                sScouloirPreMat.destroy()
                sScouloirRamdam.destroy()
                sScouloirPlateau.destroy()
                sSsallePret.destroy()
                sSsallePret2.destroy()
                sSsalleMixage.destroy()
                sRegie.destroy()
                splateauRegie.destroy()
                sCouloirAvantRamdam.destroy()
                sGrandPlateau.destroy()
                sPlateauCine.destroy()
            }
            window.etage1 = function() {
                sHallAmphie.createScene(scene)
                s.destroy()
                sInterieur.destroy()
                sHallAmphie.destroy()
                sAmphiCollet.destroy()
                sAmphiCoquet.destroy()
                couloirdirectionstaps.destroy()
                couloirstaps.destroy()
                directionstaps.destroy()
                escastaps.destroy()
                entrestaps.destroy()
                salleteam.destroy()
                sCouloirEsca.destroy()
                sCouloir.destroy()
                sCouloirSuite.destroy()
                sSalleInfo.destroy()
                sScouloirEsca.destroy()
                sScouloirMixage.destroy()
                sScouloirPreMat.destroy()
                sScouloirRamdam.destroy()
                sScouloirPlateau.destroy()
                sSsallePret.destroy()
                sSsallePret2.destroy()
                sSsalleMixage.destroy()
                sRegie.destroy()
                splateauRegie.destroy()
                sCouloirAvantRamdam.destroy()
                sGrandPlateau.destroy()
                sPlateauCine.destroy()
            }
            window.soussol = function() {
                sScouloirEsca.createScene(scene)
                s.destroy()
                sInterieur.destroy()
                sHallAmphie.destroy()
                sAmphiCollet.destroy()
                sAmphiCoquet.destroy()
                couloirdirectionstaps.destroy()
                couloirstaps.destroy()
                directionstaps.destroy()
                escastaps.destroy()
                entrestaps.destroy()
                salleteam.destroy()
                sCouloirEsca.destroy()
                sCouloir.destroy()
                sCouloirSuite.destroy()
                sSalleInfo.destroy()
                sScouloirEsca.destroy()
                sScouloirMixage.destroy()
                sScouloirPreMat.destroy()
                sScouloirRamdam.destroy()
                sScouloirPlateau.destroy()
                sSsallePret.destroy()
                sSsallePret2.destroy()
                sSsalleMixage.destroy()
                sRegie.destroy()
                splateauRegie.destroy()
                sCouloirAvantRamdam.destroy()
                sGrandPlateau.destroy()
                sPlateauCine.destroy()
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

                    if (intersect.object.name === "Pret materiel") {
                        intersect.object.onClick()
                        premat()
                    }
                    if (intersect.object.name === "Pro Tools") {
                        intersect.object.onClick()
                        protool()
                    }
                    if (intersect.object.name === "Plateau son") {
                        intersect.object.onClick()
                        son()
                    }
                    if (intersect.object.name === "Plateau video") {
                        intersect.object.onClick()
                        video()
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
                    console.log(intersectes[0].object.position)
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