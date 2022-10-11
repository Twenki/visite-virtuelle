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


<body>
    <!-- Barre de tache en bas de l'écran -->
    <div class="container">
        <div class="toolbar">
            <a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
            <a href="#"><img src="../ressources/iconMap.png" alt="Map" onclick="maFonction();"></a>
            <a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap(); arrowUp();"></a>
            <img src="../textures/drapeau_fr.png" id="drapeau" class="switch-lang" onclick="ChangeDrapeau(); ">
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
	</svg>
    <img src="../textures/ArrowUp.png" id="arrowUp" onclick="changeImage()" style="display: none;" />


    <div id="maDIV" style="display: none; width: 100%; height: 100%; ">
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
            var image = document.getElementById('minimap');
            if (image.src == "http://localhost/stage2022/lot/rdc.png") {
                image.src = "http://localhost/stage2022/lot/etage1.png";
            } else {
                image.src = "http://localhost/stage2022/lot/rdc.png"
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

        function Info() {
            var div = document.getElementById("Info");
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
            controls.enableZoom = true
            controls.enablePan = false
            controls.autoRotate = true
            controls.autoRotateSpeed = 0.1
            controls.enableDamping = true;
            controls.dampingFactor = 0.3;
            camera.position.set(1, 0, 0)
            controls.update()

            let s = new Scene('couloir.JPG', camera)
            let sSalleMicroscope = new Scene('SalleMicroscopeBaleyage2.JPG', camera)
            let sRobotique = new Scene('salleRobotique.JPG', camera)
            let sScience = new Scene('salleScience.JPG', camera)


            s.addPoint({
                position: new THREE.Vector3(-8.279245038571204, -0.8242530665743746, -7.104096436987499),
                name: '',
                scene: sSalleMicroscope,
                image: 'arrowright.png'
            })
            sSalleMicroscope.addPoint({
                position: new THREE.Vector3(-5.519541998648475, -3.8270985145432084, -8.671995680654705),
                name: '',
                scene: s,
                image: 'rond.png'
            })
            s.addPoint({
                position: new THREE.Vector3(-4.583883128026344, -5.96427383487961, 7.970076641270893),
                name: '',
                scene: sRobotique,
                image: 'rond.png'
            })
            sRobotique.addPoint({
                position: new THREE.Vector3(-3.653808814830252, -4.738691299098084, -9.200175362816903),
                name: '',
                scene: s,
                image: 'rond.png'
            })


            s.createScene(scene)
            s.appear()

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

                    if (intersect.object.name === "Info") {
                        intersect.object.onClick()
                        Info()
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