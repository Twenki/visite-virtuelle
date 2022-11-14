<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visite virtuelle - Gymnase</title>
    <link rel="stylesheet" href="../css/visite.css">
</head>


<body>
    <!-- Barre de tache en bas de l'écran -->
    <div class="container">
        <div class="toolbar">
            <a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
            <a href="#"><img src="../ressources/iconMap.png" alt="Map" onclick="maFonction(); logoInsa();"></a>
            <a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap();"></a>
            <img src="../textures/drapeau_fr.png" id="drapeau" class="switch-lang" onclick="ChangeDrapeau();">
            <img src="../textures/dyslexie.png" id="OpenDys" class="switch-font">
            <a href="#"><img src="../textures/fullscreenOn.png" name="FullScreen" onclick="fullscreen();"></a>
            <hr />
        </div>
    </div>

    <!-- Page qui s'affiche a chaque entrée de batiment -->
    <div onclick="Layer();logoInsa();">
        <img id="layer" src="layer.jpg" alt="">
    </div>

    <!-- Logo Insa en haut a gauche -->
    <div id="logoinsa" style="display: none;">
        <a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
    </div>

    <svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
        <image width="1920" height="1080" xlink:href="rdc.png"></image>
        <a xlink:href="#">
            <rect id="rdchall" x="695" y="182" fill="#fff" opacity="0" width="519" height="232" onclick="rdchall();"></rect>
        </a>
        <a xlink:href="#">
            <rect id="etage1" x="695" y="182" fill="#fff" opacity="0" width="519" height="232" onclick="etage1();"></rect>
        </a>
        <a xlink:href="#">
            <rect id="soussol" x="507" y="184" fill="#fff" opacity="0" width="358" height="668" onclick="soussol();"></rect>
        </a>
    </svg>

    <div id="maDIV" style="display: none; ">
    <div class="main">
            <div class="dropdown_list">
                <button style="position: absolute;" class="dropdown_button" onclick="show_list()">
                    Séléctionner votre formation
                </button>
                <div style="position: absolute; overflow: auto; height: 50%;" id="courses_id" class="courses">
                    <li onclick="$('[id*=region_').css('fill', '#a0a0a0a0');
                    $('[id*=region_ab2').css('fill', '#aa1d1d');
                    $('[id*=region_ab1').css('fill', '#aa1d1d');">
                        Formation Audiovisuel et Multimédia</li>

                    <li>Formation Automatique</li>

                    <li>Formation Cybersécurité</li>
                    <li>Formation Electronique et Electronique Embarquée</li>
                    <li>Formation Informatique</li>
                    <li>Formation Génie Civil</li>
                    <li>Formation Génie Industriel</li>
                    <li>Formation Génie Electrique et informatique industrielle</li>
                    <li>Formation Qualité/Hygiène/Sécruité</li>
                    <li>Formation Mathématiques</li>
                    <li>Formation Mécanique et Energétique/ Transports et Energie</li>
                    <li>Formation Physique/Chimie/Matériaux</li>
                    <li>Formation Réseaux et Télécommunications</li>

                    <li onclick="$('[id*=region_').css('fill', '#a0a0a0a0');
                    $('[id*=region_gym').css('fill', '#aa1d1d');
                    $('[id*=region_carpeaux').css('fill', '#aa1d1d');">
                        Formation STAPS</li>

                </div>
            </div>
        </div>
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
        })
        $('[lang="en"]').hide();

        $('.switch-lang').click(function() {
            $('[lang="fr"]').toggle();
            $('[lang="en"]').toggle();
        });

        $("#OpenDys").click(function() {
            $("div").toggleClass("OpenDys-font");
            $("#containerInfo").toggleClass("containerInfo");
        });

        function show_list() {
            var courses = document.getElementById("courses_id");

            if (courses.style.display == "block") {
                courses.style.display = "none";
            } else {
                courses.style.display = "block";
            }
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown_button')) {
                document.getElementById('courses_id')
                    .style.display = "none";
            }
        }
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
            controls.enableZoom = true
            controls.enablePan = false
            controls.autoRotate = true
            controls.autoRotateSpeed = 0.1
            controls.enableDamping = true;
            controls.dampingFactor = 0.3;
            camera.position.set(-1, 0, 0)
            controls.update()

            let s = new Scene('entre.jpg', camera)
            let sCouloirEnt = new Scene('couloirEnt.jpg', camera)
            let sCouloirDojo = new Scene('couloirDojo.jpg', camera)
            let stade = new Scene('stade2.jpg', camera)
            let dojo = new Scene('dojo.jpg', camera)

            s.addPoint({
                position: new THREE.Vector3(10.7980387019072, -0.03287504409687081, 2.034149840590505),
                name: '',
                scene: sCouloirEnt,
                image: 'door.png',
            })
            sCouloirEnt.addPoint({
                position: new THREE.Vector3(6.819427594699799, -2.0762384381428416, -8.306208707510027),
                name: '',
                scene: s,
                image: 'rond.png',
            })
            sCouloirEnt.addPoint({
                position: new THREE.Vector3(-10.666384146654831, -2.5179751257498038, 0.2952276840815461),
                name: '',
                scene: sCouloirDojo,
                image: 'rond.png',
            })
            sCouloirDojo.addPoint({
                position: new THREE.Vector3(9.942766610254791, -1.1473068246023899, -4.487469437477427),
                name: '',
                scene: sCouloirEnt,
                image: 'rond.png',
            })
            sCouloirDojo.addPoint({
                position: new THREE.Vector3(-9.722738479762771, -0.09755266167858341, 5.022463416131374),
                name: '',
                scene: stade,
                image: 'door.png',
            })
            sCouloirDojo.addPoint({
                position: new THREE.Vector3(5.5946754071914, -0.6566456649613666, 9.385890733382228),
                name: '',
                scene: dojo,
                image: 'door.png',
            })
            dojo.addPoint({
                position: new THREE.Vector3(9.34538249385491, -0.47053125908895865, 5.689763674095703),
                name: '',
                scene: sCouloirDojo,
                image: 'door.png',
            })
            stade.addPoint({
                position: new THREE.Vector3(-5.250701525881595, -0.04306909312103374, 9.60376301751741),
                name: '',
                scene: sCouloirDojo,
                image: 'door.png',
            })

            s.createScene(scene)
            s.appear()



            window.stade = function() {
                stade.createScene(scene)
                s.destroy()
                sCouloirEnt.destroy()
                sCouloirDojo.destroy()
                stade.destroy()
                dojo.destroy()
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