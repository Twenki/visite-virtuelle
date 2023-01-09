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
            <img src="RDC/hall2.jpg" style="width: 10%;" onclick="hall()">
            <img src="1ETAGE/couloircentreaide.jpg" style="width: 10%;" onclick="CentreAide()">
            <img src="2ETAGE/sallepc4.jpg" style="width: 10%;" onclick="etage2()">
        </ul>
    </nav>

    <!-- Barre de tache en bas de l'écran -->
    <div class="container">
        <div class="toolbar">
            <a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
            <a href="#"><img src="../ressources/iconmap.png" alt="Map" onclick="maFonction(); logoInsa(); "></a>
            <a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap(); arrowUp();"></a>
            <img src="../textures/dyslexie.png" id="OpenDys" class="switch-font">
            <a href="#"><img src="../textures/fullscreenon.png" name="FullScreen" onclick="fullscreen();"></a>

            <hr />
        </div>
    </div>

    <div id="logo">
        <img src="tp/scientifique.png" style="width: 100%;" onclick="etage2()">
        <img src="tp/fablab.png" style="width: 100%;" onclick="CentreAide()">
        <img src="tp/hall.png" style="width: 100%;" onclick="hall()">
    </div>
    <!-- Page qui s'affiche a chaque entrée de batiment -->
    <div onclick="Layer();logoInsa();">
        <img id="layer" src="layer.jpg" alt="">
    </div>

    <!-- Logo Insa en haut a gauche -->
    <div id="logoinsa" style="display: none;">
        <a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
    </div>


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
        </div>
    </div>

    <svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
        <image width="1920" height="1080" xlink:href="rdc.png"></image>
    </svg>
    <img src="../textures/arrowup.png" id="arrowUp" onclick="changeImage()" style="display: none;" />

    <!-- Grande carte du campus -->
    <div id="maDIV" style="display: none; position: -ms-page; width: 100%;">

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

        //Change d'etage sur la map en 3D
        function changeImage() {
            var image = document.querySelector("image")
            if (image.href.animVal == 'rdc.png') {
                image.setAttribute('href', "etage1.png");

            } else if (image.href.animVal == 'etage1.png') {
                image.setAttribute('href', "etage2.png");
            } else {
                image.setAttribute('href', "rdc.png")
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

        function slider() {
            var div = document.getElementById("scene");
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
                        } else if (regionId == "region_ab1") {
                            window.location = '../ap1/ab1.php';
                        } else if (regionId == "region_ab2")
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


    <script type="module">
        let camera, scene, renderer, sphere, clock;
        var delta, spriteMixer, actionSprite, running;
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
                                point.scene.destroy(scene);
                                point.scene.createScene(scene);
                                TweenLite.to(this.sphere.material, 1, {
                                    opacity: 0,
                                    onComplete: () => {
                                        this.scene.remove(this.sphere)
                                    }
                                })
                            }, 1500);

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

            }

            //Destruction des tooltip/scene a chaque changement de scene
            destroy() {

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
            });
            renderer.setSize(window.innerWidth, window.innerHeight)
            renderer.setPixelRatio(window.devicePixelRatio * 0.95);
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
            camera.position.set(1, 0, 0)
            controls.update()


            let s = new Scene('RDC/entre.jpg', camera)
            let sHall = new Scene('RDC/hallprincipal.jpg', camera)
            let sHallCom = new Scene('RDC/hallcom.jpg', camera)
            let sHallFinance = new Scene('RDC/hallfinance.jpg', camera)
            let sHall2 = new Scene('RDC/hall2.jpg', camera)
            let sAmphi200 = new Scene('RDC/amphi200.jpg', camera)
            let sAmphi300 = new Scene('RDC/amphi300.jpg', camera)
            let sEntreeExt = new Scene('RDC/entreext2.jpg', camera)
            let sTram = new Scene('tram.jpg', camera)
            let sCouloirRdc = new Scene('RDC/couloirrdc.jpg', camera)

            //Point sur les scène
            s.addPoint({
                position: new THREE.Vector3(-10.468942480245712, -1.467960149500938, -2.8200827216367097),
                name: '',
                scene: sHall,
                image: 'rond.png'
            })
            s.addPoint({
                position: new THREE.Vector3(9.083049363305841, 0.17839529911529067, -6.174431725125072),
                name: '',
                scene: sTram,
                image: 'spyglasse.png'
            })
            sTram.addPoint({
                position: new THREE.Vector3(-4.537421508034326, -0.3298448881264114, 9.969121445902818),
                name: '',
                scene: s,
                image: 'door.png'
            })

            sHall.addPoint({
                position: new THREE.Vector3(10.679058784872783, -0.6915471014575678, 2.390756041565898),
                name: '',
                scene: s,
                image: 'rond.png'
            })
            sHall.addPoint({
                position: new THREE.Vector3(8.30643872703265, -0.7157245544668818, -7.079324914861078),
                name: '',
                scene: sHallCom,
                image: 'door.png'
            })
            sHallCom.addPoint({
                position: new THREE.Vector3(9.103767105868098, -1.3438219070500532, -5.995586392817242),
                name: '',
                scene: sHall,
                image: 'door.png'
            })
            sHallCom.addPoint({
                position: new THREE.Vector3(-9.935424713260202, -4.446783491092547, 1.1679375718054734),
                name: '',
                scene: sHallFinance,
                image: 'rond.png'
            })
            sHallFinance.addPoint({
                position: new THREE.Vector3(7.339074680766127, -6.893866128410788, 4.353068897638688),
                name: '',
                scene: sHallCom,
                image: 'rond.png'
            })

            sHall.addPoint({
                position: new THREE.Vector3(6.255092316704699, -0.8290995795427342, 8.975698130208668),
                name: 'Amphie 200',
                scene: sAmphi200,
                image: 'door.png'
            })

            sHall.addPoint({
                position: new THREE.Vector3(-10.888265580390348, -0.23469455089390068, -1.0173946079276006),
                name: 'Amphie 300',
                scene: sAmphi300,
                image: 'door.png'
            })

            sAmphi300.addPoint({
                position: new THREE.Vector3(-10.592094976832428, -1.0759358436633, 2.6126978138914465),
                name: '',
                scene: sHall,
                image: 'arrowright.png'
            })

            sAmphi200.addPoint({
                position: new THREE.Vector3(-8.889877160162126, -1.5453162662689475, 6.231769614730984),
                name: '',
                scene: sHall,
                image: 'door.png'
            })

            sHall.addPoint({
                position: new THREE.Vector3(-10.458464624672366, -0.23056818122711975, -3.195596890076094),
                name: '',
                scene: sEntreeExt,
                image: 'rond.png'
            })

            sEntreeExt.addPoint({
                position: new THREE.Vector3(-10.08654029053534, -2.078572977505144, -3.7701712928225186),
                name: '',
                scene: sHall,
                image: 'rond.png'
            })

            sHall.addPoint({
                position: new THREE.Vector3(-5.978561610016408, -2.0726851994520024, 8.990865113145675),
                name: '',
                scene: sHall2,
                image: 'rond.png'
            })

            sHall2.addPoint({
                position: new THREE.Vector3(-7.872250030513502, -3.3487388796302993, -6.833167962483899),
                name: '',
                scene: sHall,
                image: 'rond.png'
            })
            sHall2.addPoint({
                position: new THREE.Vector3(10.045886766464392, -2.646059914709466, 3.4404729633956324),
                name: '',
                scene: sCouloirRdc,
                image: 'rond.png'
            })
            sCouloirRdc.addPoint({
                position: new THREE.Vector3(9.019877925866794, -4.351495774657383, -4.438065650653516),
                name: '',
                scene: sHall2,
                image: 'rond.png'
            })



            // --------------- Abel de pujol 1 / Etage 1

            //Déclaration des scène
            let sEtage1 = new Scene('1ETAGE/etage1.jpg', camera)
            let sCouloirAmphie = new Scene('1ETAGE/couloiramphi.jpg', camera)
            let sAmphi70 = new Scene('1ETAGE/amphi70.jpg', camera)
            let sCouloirEsca = new Scene('1ETAGE/couloiresca.jpg', camera)
            let sCouloirCentreAide = new Scene('1ETAGE/couloircentreaide.jpg', camera)
            let sCouloirHubhouse = new Scene('1ETAGE/couloirhubhouse.jpg', camera)
            let sCentreAide = new Scene('1ETAGE/centreaide.jpg', camera)
            let sHubHouse = new Scene('1ETAGE/hubhouse.jpg', camera)

            //Point sur les scène
            sHall.addPoint({
                position: new THREE.Vector3(-9.206540968481459, 0.7992473490596483, -5.9154253863919415),
                name: '',
                scene: sEtage1,
                image: 'rond.png'
            })

            sEtage1.addPoint({
                position: new THREE.Vector3(-2.0169278668533277, -5.327764348751409, -9.388251721273761),
                name: '',
                scene: sHallFinance,
                image: 'rond.png'
            })
            sHallFinance.addPoint({
                position: new THREE.Vector3(-8.739480987020219, -3.829421481163647, 5.391531249267639),
                name: '',
                scene: sEtage1,
                image: 'rond.png'
            })
            sEtage1.addPoint({
                position: new THREE.Vector3(-6.208967112768608, -7.656740313844018, -4.8087766739376825),
                name: '',
                scene: sHall,
                image: 'rond.png'
            })

            sEtage1.addPoint({
                position: new THREE.Vector3(2.363866551135308, -2.9054984708526668, 10.304888783365593),
                name: '',
                scene: sCouloirAmphie,
                image: 'rond.png'
            })

            sCouloirAmphie.addPoint({
                position: new THREE.Vector3(-8.595343362570276, -3.7138130942481444, 5.747160677123385),
                name: '',
                scene: sEtage1,
                image: 'rond.png'
            })

            sCouloirAmphie.addPoint({
                position: new THREE.Vector3(9.956224832400714, -0.23894680964501402, -4.570976711077605),
                name: 'Amphi 70',
                scene: sAmphi70,
                image: 'door.png'
            })

            sAmphi70.addPoint({
                position: new THREE.Vector3(8.35550379654904, -1.2352661758859471, -6.9550536117775215),
                name: '',
                scene: sCouloirAmphie,
                image: 'arrowleft.png'
            })

            sCouloirAmphie.addPoint({
                position: new THREE.Vector3(1.295680618372499, -3.0410523532575726, -10.436824101126241),
                name: '',
                scene: sCouloirEsca,
                image: 'rond.png'
            })

            sCouloirEsca.addPoint({
                position: new THREE.Vector3(-10.292128268107156, -3.4179842879250746, -1.5611727086559197),
                name: '',
                scene: sCouloirAmphie,
                image: 'rond.png'
            })
            sCouloirEsca.addPoint({
                position: new THREE.Vector3(-5.0550533764991865, -3.64608056921079, 8.993357660879889),
                name: '',
                scene: sHall2,
                image: 'rond.png'
            })
            sHall2.addPoint({
                position: new THREE.Vector3(8.562910949540097, -2.480188436328324, 6.359083167624441),
                name: '',
                scene: sCouloirEsca,
                image: 'rond.png'
            })

            sCouloirEsca.addPoint({
                position: new THREE.Vector3(10.454274719170188, -3.129717072665537, -0.8930061904849269),
                name: '',
                scene: sCouloirCentreAide,
                image: 'rond.png'
            })

            sCouloirCentreAide.addPoint({
                position: new THREE.Vector3(-9.480972309904052, -2.439106849446694, 4.883675912586867),
                name: '',
                scene: sCouloirEsca,
                image: 'rond.png'
            })

            sCouloirCentreAide.addPoint({
                position: new THREE.Vector3(8.660253738834424, -4.09910248771342, -5.336043913320166),
                name: '',
                scene: sCouloirHubhouse,
                image: 'rond.png'
            })

            sCouloirHubhouse.addPoint({
                position: new THREE.Vector3(-2.478577585105804, -2.9681017904622173, 10.25378359866124),
                name: '',
                scene: sCouloirCentreAide,
                image: 'rond.png'
            })

            sCouloirCentreAide.addPoint({
                position: new THREE.Vector3(10.299918595411723, -1.1246848365074202, 3.5518500928794343),
                name: '',
                scene: sCentreAide,
                image: 'door.png'
            })

            sCentreAide.addPoint({
                position: new THREE.Vector3(8.996578259854122, 0.07828803438455911, 6.287512001578141),
                name: '',
                scene: sCouloirCentreAide,
                image: 'arrowright.png'
            })

            sCouloirHubhouse.addPoint({
                position: new THREE.Vector3(-4.874214201462238, -0.7640928734209235, -9.765028899309506),
                name: '',
                scene: sHubHouse,
                image: 'door.png'
            })

            sHubHouse.addPoint({
                position: new THREE.Vector3(-8.686569237614464, -0.4058677597603166, -6.64001361349838),
                name: '',
                scene: sCouloirHubhouse,
                image: 'arrowright.png'
            })

            // --------------- Abel de pujol 1 / Etage 2 ----------------- //

            //Déclaration des scène
            let sCouloir = new Scene('2ETAGE/couloir.jpg', camera)
            let sCouloirPhysique = new Scene('2ETAGE/couloirphysique.jpg', camera)
            let sSallePc8 = new Scene('2ETAGE/sallepc8.jpg', camera)
            let sSallePc4 = new Scene('2ETAGE/sallepc4.jpg', camera)

            //Point sur les scène
            sCouloirEsca.addPoint({
                position: new THREE.Vector3(-0.5669852266434524, -1.1112425445995788, 10.88628566141453),
                name: '',
                scene: sCouloir,
                image: 'rond.png'
            })

            sCouloir.addPoint({
                position: new THREE.Vector3(-8.53235735563133, 0.5782787841014579, 6.814634229700246),
                name: '',
                scene: sCouloirEsca,
                image: 'arrowright.png'
            })

            sCouloir.addPoint({
                position: new THREE.Vector3(0.3972536446958471, -2.5861082741451664, 10.639269013410548),
                name: '',
                scene: sCouloirPhysique,
                image: 'rond.png'
            })

            sCouloirPhysique.addPoint({
                position: new THREE.Vector3(-10.286861454423255, -3.4245245867870517, 1.5908850651879989),
                name: '',
                scene: sCouloir,
                image: 'rond.png'
            })

            sCouloirPhysique.addPoint({
                position: new THREE.Vector3(10.74617345997559, -1.3059515776642663, 1.696319924968214),
                name: 'Salle de physique',
                scene: sSallePc8,
                image: 'door.png'
            })

            sSallePc8.addPoint({
                position: new THREE.Vector3(7.862309667651402, -1.9056086091031001, 7.400025524615259),
                name: '',
                scene: sCouloirPhysique,
                image: 'arrowleft.png'
            })

            sCouloirPhysique.addPoint({
                position: new THREE.Vector3(6.642484729306192, -1.8127147644720274, 8.501747030463793),
                name: 'Salle de physique',
                scene: sSallePc4,
                image: 'door.png'
            })

            sSallePc4.addPoint({
                position: new THREE.Vector3(-8.279245038571204, -0.8242530665743746, -7.104096436987499),
                name: '',
                scene: sCouloirPhysique,
                image: 'arrowleft.png'
            })
            //                      -------------------------------------------------
            //                                  Point d'info
            sSallePc4.addPoint({
                position: new THREE.Vector3(-9.975944756234636, -3.266699634842341, -3.1110028576085775),
                name: 'spectrophometre infrarouge',
                scene: false,
                image: 'info.png'
            })

            sSallePc4.addPoint({
                position: new THREE.Vector3(3.373988661727905, -1.1416261436927218, 10.351258776261691),
                name: 'spectrophometre a fluorescence X',
                scene: false,
                image: 'info.png'
            })

            sSallePc4.addPoint({
                position: new THREE.Vector3(1.6335125662011079, -0.9983605131204817, -10.790066614449128),
                name: 'spectrophometre a absorption atomique',
                scene: false,
                image: 'info.png'
            })
            s.addPoint({
                position: new THREE.Vector3(-8.263998285248835, -1.1662377744152068, -7.082616160453021),
                name: 'Information',
                scene: false,
                image: 'panneau.png'
            })

            s.createScene(scene)
            s.appear()


            //Desactivation de tout les point quand on utilise la carte en 3D
            window.hall = function() {
                sHall.createScene(scene)
                s.destroy()
                sHall.destroy()
                sHallCom.destroy()
                sHallFinance.destroy()
                sHall2.destroy()
                sAmphi200.destroy()
                sAmphi300.destroy()
                sEntreeExt.destroy()
                sTram.destroy()
                sCouloirRdc.destroy()
                sEtage1.destroy()
                sCouloirAmphie.destroy()
                sAmphi70.destroy()
                sCouloirEsca.destroy()
                sCouloirCentreAide.destroy()
                sCouloirHubhouse.destroy()
                sCentreAide.destroy()
                sHubHouse.destroy()
                sCouloir.destroy()
                sCouloirPhysique.destroy()
                sSallePc8.destroy()
                sSallePc4.destroy()
            }
            window.amphi300 = function() {
                sAmphi300.createScene(scene)
                s.destroy()
                sHall.destroy()
                sHallCom.destroy()
                sHallFinance.destroy()
                sHall2.destroy()
                sAmphi200.destroy()
                sAmphi300.destroy()
                sEntreeExt.destroy()
                sTram.destroy()
                sCouloirRdc.destroy()
                sEtage1.destroy()
                sCouloirAmphie.destroy()
                sAmphi70.destroy()
                sCouloirEsca.destroy()
                sCouloirCentreAide.destroy()
                sCouloirHubhouse.destroy()
                sCentreAide.destroy()
                sHubHouse.destroy()
                sCouloir.destroy()
                sCouloirPhysique.destroy()
                sSallePc8.destroy()
                sSallePc4.destroy()
            }
            window.etage2 = function() {
                sSallePc4.createScene(scene)
                s.destroy()
                sHall.destroy()
                sHallCom.destroy()
                sHallFinance.destroy()
                sHall2.destroy()
                sAmphi200.destroy()
                sAmphi300.destroy()
                sEntreeExt.destroy()
                sTram.destroy()
                sCouloirRdc.destroy()
                sEtage1.destroy()
                sCouloirAmphie.destroy()
                sAmphi70.destroy()
                sCouloirEsca.destroy()
                sCouloirCentreAide.destroy()
                sCouloirHubhouse.destroy()
                sCentreAide.destroy()
                sHubHouse.destroy()
                sCouloir.destroy()
                sCouloirPhysique.destroy()
                sSallePc8.destroy()
                sSallePc4.destroy()
            }
            window.CentreAide = function() {
                sCouloirCentreAide.createScene(scene)
                s.destroy()
                sHall.destroy()
                sHallCom.destroy()
                sHallFinance.destroy()
                sHall2.destroy()
                sAmphi200.destroy()
                sAmphi300.destroy()
                sEntreeExt.destroy()
                sTram.destroy()
                sCouloirRdc.destroy()
                sEtage1.destroy()
                sCouloirAmphie.destroy()
                sAmphi70.destroy()
                sCouloirEsca.destroy()
                sCouloirCentreAide.destroy()
                sCouloirHubhouse.destroy()
                sCentreAide.destroy()
                sHubHouse.destroy()
                sCouloir.destroy()
                sCouloirPhysique.destroy()
                sSallePc8.destroy()
                sSallePc4.destroy()
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

            delta = clock.getDelta();
            spriteMixer.update(delta);

            if (running == 'right') {
                actionSprite.position.x += 0.05;
            }

        };


        //Fonction plein ecran
    </script>

</body>

</html>