<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=visitevirtuelle;', 'root', '');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visite virtuelle - Batiment Claudin LeJeune 1</title>
	<link rel="stylesheet" href="../css/visite.css">
</head>


<body>
	<!-- Barre de tache en bas de l'écran -->
	<div class="container">
		<div class="toolbar">
			<a href="../carrousel/index.html"><img class="accueil" src="../textures/accueil.png" alt="accueil"></a>
			<a href="#"><img src="../ressources/iconMap.png" alt="Map" onclick="maFonction(); logoInsa();"></a>
			<a href="#"><img src="../textures/minimap.png" name="minimap" onclick="openmap(); arrowUp();"></a>
			<img src="../textures/drapeau_fr.png" id="drapeau" class="switch-lang" onclick="ChangeDrapeau();">
			<img src="../textures/dyslexie.png" id="OpenDys" class="switch-font">
			<a href="#"><img src="../textures/fullscreenOn.png" name="FullScreen" onclick="fullscreen();"></a>
			<hr />
		</div>
	</div>

	<div id="logo">
		<img src="tp/cl1.png" style="width: 100%;" onclick="rdcCl1()">
		<img src="tp/cl2.png" style="width: 100%;" onclick="rdcCl2()">
		<img src="tp/cl3.png" style="width: 100%;" onclick="rdcCl3()">
	</div>
	<!--Video-->
	<div id="video_directeur" onclick="video_directeur();">
		<iframe src="https://pod.uphf.fr/video/2286-presentation-insa/?is_iframe=true" width="80%" height="80%" allowfullscreen></iframe>
	</div>

	<!-- Logo Insa en haut a gauche -->
	<div id="logoinsa" style="display: block;">
		<a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
	</div>

	<div id="information" style="display: none;" onclick="information();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="8"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="8"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>
	<div id="information2" style="display: none;" onclick="information2();">
        <div id="containerInfo">
            <div id="text" lang="fr">
                <?php
                $recupText = $bdd->query('SELECT * FROM text WHERE id="9"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
            <div id="text" lang="en">
                <?php
                $recupText = $bdd->query('SELECT * FROM texten WHERE id="9"');
                while ($text = $recupText->fetch()) {
                    echo $text['contenu'];
                }
                ?>
            </div>
        </div>
    </div>

	<!--
	<map name="map">
		<area id="rdcCl1" onclick="Enabled=false;rdcCl1();" shape="poly" coords="141,166,184,165,187,137,336,137,332,86,303,84,302,49,274,48,275,107,209,106,232,49,160,48,167,9,150,7,130,88,141,90,130,131,147,134" alt="Couloir" style="display: none;" />
		<area onclick="rdcCl3();" shape="poly" coords="110,43,268,44,273,106,177,108,174,125,57,124" alt="Couloir" style="display: none;" />
	</map>
		-->
	<svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
		<image width="1920" height="1080" xlink:href="rdc.png"></image> <a xlink:href="#">
			<rect id="rdc" x="341" y="246" fill="#fff" opacity="0" width="1134" height="600" onclick="rdcCl1();;"></rect>
		</a><a xlink:href="#">
			<rect id="cl3" x="324" y="184" fill="#fff" opacity="0" width="1296" height="520" onclick="rdcCl3();;"></rect>
		</a>
	</svg>
	<img src="../textures/ArrowUp.png" id="arrowUp" onclick="changeImage()" style="display: none;" />

	<!-- Grande carte du campus -->
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
		function information() {
            var div = document.getElementById("information");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
		function information2() {
            var div = document.getElementById("information2");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
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
				image.setAttribute('href', "rdccl3.png");
				document.getElementById("rdc").style.display = 'none';
				document.getElementById("cl3").style.display = 'block';

			} else {
				image.setAttribute('href', "rdc.png")
				document.getElementById("rdc").style.display = 'block';
				document.getElementById("cl3").style.display = 'none';
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

		function openmap() {
			var div = document.getElementById("minimap");
			if (div.style.display === "none") {
				div.style.display = "block";
			} else {
				div.style.display = "none";
			}
			document.getElementById("cl3").style.display = 'none'
		}

		function maFonction() {
			var div = document.getElementById("maDIV");
			if (div.style.display === "none") {
				div.style.display = "block";
			} else {
				div.style.display = "none";
			}

		}

		function video_directeur() {
			var div = document.getElementById("video_directeur");
			if (div.style.display === "none") {
				div.style.display = "block";
			} else {
				div.style.display = "none";
			}
			document.getElementById('video_directeur').parentNode.removeChild(document.getElementById('video_directeur'));
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
			camera.position.set(-1, 0, 0)
			controls.update()

			let s = new Scene('RDC/entrerInt.jpg', camera)
			let sCl3Ext = new Scene('RDC/entreExt.jpg', camera)
			let sHall = new Scene('RDC/hall.jpg', camera)
			let sCouloirEntrer = new Scene('RDC/couloirEntrer.jpg', camera)
			let sCouloirFablab = new Scene('RDC/couloirFablab.jpg', camera)
			let sSalleTp8 = new Scene('RDC/salleTP8.jpg', camera)
			let sSalleTp1 = new Scene('RDC/salleTP1.jpg', camera)
			let sCouloirTp = new Scene('RDC/couloirTp.jpg', camera)
			let sSalleTp2 = new Scene('RDC/salleTP2.jpg', camera)
			let sentreCL3 = new Scene('RDC/entreCL3.jpg', camera)
			let sEntreInt = new Scene('RDC/entreInt.jpg', camera)
			let sBasEscalier = new Scene('RDC/basEscalier.jpg', camera)
			let sHallCl3 = new Scene('RDC/Hallcl3.jpg', camera)
			let sEscalierHall = new Scene('RDC/escalierHall.jpg', camera)
			let sCouloirPft = new Scene('RDC/couloirPft.jpg', camera)
			let sPft1 = new Scene('RDC/PFT.jpg', camera)
			let sPft2 = new Scene('RDC/PFT2.jpg', camera)
			let spft3 = new Scene('RDC/PFT3.jpg', camera)
			let sPft4 = new Scene('RDC/PFT4.jpg', camera)
			let scouloir = new Scene('couloirAmphi.jpg', camera)
			let sAmphi1 = new Scene('amphi.jpg', camera)
			let sAmphi2 = new Scene('amphi2.jpg', camera)
			let sEntreCl1 = new Scene('RDC/entrecl1.jpg', camera)

			//Point sur les scène
			s.addPoint({
				position: new THREE.Vector3(3.3425917954582585, -4.3557951682028975, 9.482916033562756),
				name: '',
				scene: sHall,
				image: 'rond.png'
			})
			s.addPoint({
				position: new THREE.Vector3(5.335715731852955, -3.03392759168428, -9.071222275375053),
				name: '',
				scene: sEntreCl1,
				image: 'rond.png'
			})
			sEntreCl1.addPoint({
				position: new THREE.Vector3(5.4719472790866766, -1.7952341870054371, 9.308097764408881),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			sEntreCl1.addPoint({
                position: new THREE.Vector3(1.4279212315413545, -2.547232239045808, 10.547495060755557),
                name: 'Information',
                scene: false,
                image: 'panneau.png'
            })
			sCl3Ext.addPoint({
                position: new THREE.Vector3(9.178916706441207, -1.2411519005950296, 5.887143278198129),
                name: 'Information 2',
                scene: false,
                image: 'panneau.png'
            })
			sHall.addPoint({
				position: new THREE.Vector3(-8.960547002913097, -1.694405849104562, -6.110965305616871),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			s.addPoint({
				position: new THREE.Vector3(-8.465826153381203, -2.805571664049183, -6.349524029590561),
				name: '',
				scene: sCouloirEntrer,
				image: 'rond.png'
			})
			sCouloirEntrer.addPoint({
				position: new THREE.Vector3(-0.6110315894615828, -3.0429567111529754, -10.503779064328715),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			sCouloirEntrer.addPoint({
				position: new THREE.Vector3(6.9391544332665935, -5.120481353313262, -6.811107239901597),
				name: '',
				scene: scouloir,
				image: 'rond.png'
			})
			scouloir.addPoint({
				position: new THREE.Vector3(-5.085354632489591, -2.7805115206375444, -9.27667254898899),
				name: '',
				scene: sCouloirEntrer,
				image: 'rond.png'
			})
			sCouloirEntrer.addPoint({
				position: new THREE.Vector3(-10.64012150019754, -2.4773814613229295, -0.6651136859885793),
				name: '',
				scene: sCouloirFablab,
				image: 'rond.png'
			})
			sCouloirFablab.addPoint({
				position: new THREE.Vector3(10.50917677664037, -2.8980420111912117, 0.9247782551477033),
				name: '',
				scene: sCouloirEntrer,
				image: 'rond.png'
			})
			sCouloirFablab.addPoint({
				position: new THREE.Vector3(-6.699308225677643, -1.9746922685223518, 8.424180340987963),
				name: '',
				scene: sSalleTp8,
				image: 'door.png'
			})
			sSalleTp8.addPoint({
				position: new THREE.Vector3(-0.28276276919656, -0.6864137228382032, -10.938428919604892),
				name: '',
				scene: sCouloirFablab,
				image: 'arrowleft.png'
			})
			sCouloirEntrer.addPoint({
				position: new THREE.Vector3(-10.798688700290356, -0.5993026862747067, 1.7450187689562913),
				name: '',
				scene: sSalleTp1,
				image: 'door.png'
			})
			sSalleTp1.addPoint({
				position: new THREE.Vector3(7.7029692607012645, -0.47943490156151125, -7.809571327214472),
				name: '',
				scene: sCouloirEntrer,
				image: 'door.png'
			})
			sCouloirEntrer.addPoint({
				position: new THREE.Vector3(9.867007656274257, -4.729592820599556, 0.5045100882069015),
				name: '',
				scene: sCouloirTp,
				image: 'rond.png'
			})
			sCouloirTp.addPoint({
				position: new THREE.Vector3(10.51452146320179, -2.0086963792732666, 2.39484167848335),
				name: '',
				scene: sCouloirEntrer,
				image: 'arrowleft.png'
			})
			sCouloirTp.addPoint({
				position: new THREE.Vector3(-5.908165625568661, -2.6078147663677638, 8.885684865014415),
				name: '',
				scene: sSalleTp2,
				image: 'door.png'
			})
			sSalleTp2.addPoint({
				position: new THREE.Vector3(-9.211975333557541, -5.189736478055669, -2.8816591841396075),
				name: '',
				scene: sCouloirTp,
				image: 'rond.png'
			})

			//Abel de Claudin 1 / Etage 1
			//Déclaration des scène

			let sEsca = new Scene('1ETAGE/esca.jpg', camera)

			//Points sur les scènes
			sHall.addPoint({
				position: new THREE.Vector3(-3.7833341857039287, -0.4266504508101928, -10.2701586743408),
				name: '',
				scene: sEsca,
				image: 'rond.png'
			})
			s.addPoint({
				position: new THREE.Vector3(10.050195507466466, -2.5352022924011046, 3.52146721536564),
				name: '',
				scene: sEsca,
				image: 'arrowleft.png'
			})
			sEsca.addPoint({
				position: new THREE.Vector3(-4.232595075585483, -6.093536699393734, 8.73367167166747),
				name: '',
				scene: sHall,
				image: 'arrowleft.png'
			})

			//Point sur les scène modif ici
			scouloir.addPoint({
				position: new THREE.Vector3(10.392056893031304, -0.8932995046322207, 3.302895325457971),
				name: '',
				scene: sAmphi1,
				image: 'door.png'
			})
			scouloir.addPoint({
				position: new THREE.Vector3(-1.1302765161588422, -0.41168883497072517, -10.868452435275444),
				name: '',
				scene: sAmphi2,
				image: 'door.png'
			})
			sAmphi1.addPoint({
				position: new THREE.Vector3(-10.784552283144382, 0.14424165352888685, 2.11553058473628),
				name: '',
				scene: scouloir,
				image: 'rond.png'
			})
			sAmphi2.addPoint({
				position: new THREE.Vector3(10.958558680791167, 0.2138599530961695, -0.3140888652912364),
				name: '',
				scene: scouloir,
				image: 'rond.png'
			})

			//Point sur les scène
			sentreCL3.addPoint({
				position: new THREE.Vector3(8.81003078677795, -4.162979049257913, -5.007580060138166),
				name: '',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(8.493627006402983, -5.540705157775507, 4.14036020483737),
				name: '',
				scene: sCl3Ext,
				image: 'rond.png'
			})
			sCl3Ext.addPoint({
				position: new THREE.Vector3(10.444235398303793, -1.0288598549498724, 3.1080544270470645),
				name: '',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(-6.606398575238191, -1.9568362748957833, -8.503839271454332),
				name: '',
				scene: sBasEscalier,
				image: 'rond.png'
			})
			
			sHallCl3.addPoint({
				position: new THREE.Vector3(-10.292584579648361, -1.8971124473360133, 3.1832144974540144),
				name: '',
				scene: sBasEscalier,
				image: 'rond.png'
			})
			sHallCl3.addPoint({
				position: new THREE.Vector3(-6.872723931012591,-0.5258852250689572, 8.487998076413819),
				name: '',
				scene: sPft4,
				image: 'door.png'
			})
			sPft4.addPoint({
				position: new THREE.Vector3(-9.200810232830309, -2.094267863046927, 5.579023084542151),
				name: '',
				scene: sHallCl3,
				image: 'door.png'
			})
			sPft4.addPoint({
				position: new THREE.Vector3(10.320080897399677, 0.7296973896413117, -3.567722685814093),
				name: '',
				scene: spft3,
				image: 'door.png'
			})
			spft3.addPoint({
				position: new THREE.Vector3(-10.872153691728, 0.10684250200474843, 1.2447531491036932),
				name: '',
				scene: sPft4,
				image: 'door.png'
			})
			spft3.addPoint({
				position: new THREE.Vector3(-5.857189960205646, -0.05009241610062076, 9.279198797748379),
				name: '',
				scene: sPft2,
				image: 'door.png'
			})
			sPft2.addPoint({
				position: new THREE.Vector3(10.382682564057903, 0.34249447243760617, -3.4265659918051785),
				name: '',
				scene: spft3,
				image: 'door.png'
			})
			sHallCl3.addPoint({
				position: new THREE.Vector3(10.530310185641177, -0.4770815785765352, -2.917235696545704),
				name: '',
				scene: sEscalierHall,
				image: 'arrowright.png'
			})
			sEscalierHall.addPoint({
				position: new THREE.Vector3(-3.4508109496932917, -1.7021454805867924, -10.24148659094042),
				name: '',
				scene: sHallCl3,
				image: 'arrowleft.png'
			})
			sEscalierHall.addPoint({
				position: new THREE.Vector3(10.79205403409137, -1.4716231819790666, -0.9809713774478452),
				name: '',
				scene: sCouloirPft,
				image: 'rond.png'
			})
			sCouloirPft.addPoint({
				position: new THREE.Vector3(-9.731876181111343, -3.643441503116187, 3.4534523894449185),
				name: '',
				scene: sEscalierHall,
				image: 'rond.png'
			})
			sCouloirPft.addPoint({
				position: new THREE.Vector3(8.335187722643502, -0.3836142544318596, 7.069888135679146),
				name: '',
				scene: sPft1,
				image: 'door.png'
			})
			sPft1.addPoint({
				position: new THREE.Vector3(-7.5758453559138434, -4.334841165971625, 6.618201948698681),
				name: 'Sortie ',
				scene: sCouloirPft,
				image: 'rond.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(5.88733162860869, -3.189431355807054, 8.721350193107485),
				name: 'Entrée du batiment ',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(9.189028674768036, -2.9975665522617394, -5.134543482650731),
				name: 'Entrée du batiment ',
				scene: sHallCl3,
				image: 'rond.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(-4.8276689499169, -2.3383648393514083, -9.539384049688445),
				name: 'Entrée du  ',
				scene: scouloir,
				image: 'rond.png'
			})
			scouloir.addPoint({
				position: new THREE.Vector3(7.631561802093376, -1.8870569898090963, 7.6758356422569705),
				name: 'Entrée du  ',
				scene: sBasEscalier,
				image: 'rond.png'
			})

			//Abel de Claudin 1 / Rez de chaussé
			//Déclaration des scène
			let sEtage1CouloirConseil = new Scene('1ETAGE/couloirSalleConseil.jpg', camera)
			let sEtage1CouloirCentral = new Scene('1ETAGE/couloirCentral.jpg', camera)
			let sEtage1CouloirPLP = new Scene('1ETAGE/couloirPLP.jpg', camera)
			let sEtage1PLP = new Scene('1ETAGE/PLP.jpg', camera)
			let sEtage1Conseil = new Scene('1ETAGE/Conseil.jpg', camera)

			sEscalierHall.addPoint({
				position: new THREE.Vector3(-10.760719735121114, 1.642134783924429, 1.0423107538619056),
				name: 'Entrée du batiment ',
				scene: sEtage1CouloirConseil,
				image: 'rond.png'
			})

			sEtage1CouloirConseil.addPoint({
				position: new THREE.Vector3(8.88906145437431, -3.8791567933596554, 5.07411715668933),
				name: 'Entrée du batiment ',
				scene: sEscalierHall,
				image: 'arrowright.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(2.6229125250020835, -0.6787089523043933, -10.609290802912568),
				name: 'Entrée du batiment ',
				scene: sEtage1CouloirCentral,
				image: 'arrowright.png'
			})
			sEtage1CouloirCentral.addPoint({
				position: new THREE.Vector3(-10.621632906312787, -2.4737922522798756, -0.861959300513484),
				name: 'Etage 1 ',
				scene: sBasEscalier,
				image: 'rond.png'
			})
			sEtage1CouloirCentral.addPoint({
				position: new THREE.Vector3(9.99292402980088, -2.2756912975947854, -3.93311935679772),
				name: 'Couloir PLP ',
				scene: sEtage1CouloirPLP,
				image: 'rond.png'
			})

			sEtage1CouloirPLP.addPoint({
				position: new THREE.Vector3(-10.871125169165067, 1.5015823355088258, -0.13302941979355043),
				name: 'Salle PLP ',
				scene: sEtage1PLP,
				image: 'door.png'
			})
			sEtage1CouloirPLP.addPoint({
				position: new THREE.Vector3(-0.5553512184352667, -2.539095233300885, -10.635473986414679),
				name: 'Couloir Central ',
				scene: sEtage1CouloirCentral,
				image: 'rond.png'
			})
			sEtage1PLP.addPoint({
				position: new THREE.Vector3(10.619445263733335, -0.350371798676132, 2.644737129183657),
				name: 'Salle PLP ',
				scene: sEtage1CouloirPLP,
				image: 'rond.png'
			})
			sEtage1CouloirConseil.addPoint({
				position: new THREE.Vector3(-10.723335549744483, 1.0681452742900879, 2.181367472835402),
				name: 'Salle du Conseil ',
				scene: sEtage1Conseil,
				image: 'door.png'
			})
			sEtage1Conseil.addPoint({
				position: new THREE.Vector3(-2.725959879821949, -1.0662744845422625, -10.558230927664756),
				name: 'Salle du Conseil ',
				scene: sEtage1CouloirConseil,
				image: 'arrowleft.png'
			})


			s.createScene(scene)
			s.appear()

			window.rdcCl1 = function() {
				sEntreCl1.createScene(scene)
				s.destroy()
				sEntreCl1.destroy()
				sHall.destroy()
				sCouloirEntrer.destroy()
				sCouloirFablab.destroy()
				sSalleTp8.destroy()
				sSalleTp1.destroy()
				sCouloirTp.destroy()
				sSalleTp2.destroy()
				sentreCL3.destroy()
				sEntreInt.destroy()
				sBasEscalier.destroy()
				sHallCl3.destroy()
				sEscalierHall.destroy()
				sCouloirPft.destroy()
				sPft1.destroy()
				sPft2.destroy()
				scouloir.destroy()
				sAmphi1.destroy()
				sAmphi2.destroy()
				sEsca.destroy()
				sEtage1CouloirConseil.destroy()
				sEtage1CouloirCentral.destroy()
				sEtage1CouloirPLP.destroy()
				sEtage1PLP.destroy()
				sEtage1Conseil.destroy()
			}
			window.rdcCl2 = function() {
				scouloir.createScene(scene)
				s.destroy()
				sEntreCl1.destroy()
				sHall.destroy()
				sCouloirEntrer.destroy()
				sCouloirFablab.destroy()
				sSalleTp8.destroy()
				sSalleTp1.destroy()
				sCouloirTp.destroy()
				sSalleTp2.destroy()
				sentreCL3.destroy()
				sEntreInt.destroy()
				sBasEscalier.destroy()
				sHallCl3.destroy()
				sEscalierHall.destroy()
				sCouloirPft.destroy()
				sPft1.destroy()
				sPft2.destroy()
				scouloir.destroy()
				sAmphi1.destroy()
				sAmphi2.destroy()
				sEsca.destroy()
				sEtage1CouloirConseil.destroy()
				sEtage1CouloirCentral.destroy()
				sEtage1CouloirPLP.destroy()
				sEtage1PLP.destroy()
				sEtage1Conseil.destroy()
			}
			window.rdcCl3 = function() {
				sCl3Ext.createScene(scene)
				s.destroy()
				sEntreCl1.destroy()
				sHall.destroy()
				sCouloirEntrer.destroy()
				sCouloirFablab.destroy()
				sSalleTp8.destroy()
				sSalleTp1.destroy()
				sCouloirTp.destroy()
				sSalleTp2.destroy()
				sentreCL3.destroy()
				sEntreInt.destroy()
				sBasEscalier.destroy()
				sHallCl3.destroy()
				sEscalierHall.destroy()
				sCouloirPft.destroy()
				sPft1.destroy()
				sPft2.destroy()
				scouloir.destroy()
				sAmphi1.destroy()
				sAmphi2.destroy()
				sEsca.destroy()
				sEtage1CouloirConseil.destroy()
				sEtage1CouloirCentral.destroy()
				sEtage1CouloirPLP.destroy()
				sEtage1PLP.destroy()
				sEtage1Conseil.destroy()
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

					if (intersect.object.name === "Info") {
						intersect.object.onClick()
						Info()
					}
					if (intersect.object.name === "Information") {
                        intersect.object.onClick()
                        information()
                    }
					if (intersect.object.name === "Information 2") {
                        intersect.object.onClick()
                        information2()
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