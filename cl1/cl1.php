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
			<a href="#"><img src="../ressources/iconMap.png" alt="Map" onclick="maFonction();"></a>
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
		<a href="https://www.uphf.fr/insa-hdf"><img src="../textures/logoinsa.png" style="width: 100%;"></a>
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
			camera.position.set(-1, 0, 0)
			controls.update()

			let s = new Scene('RDC/entrerInt.JPG', camera)
			let sHall = new Scene('RDC/hall.JPG', camera)
			let sCouloirEntrer = new Scene('RDC/couloirEntrer.JPG', camera)
			let sCouloirFablab = new Scene('RDC/couloirFablab.JPG', camera)
			let sSalleTp8 = new Scene('RDC/salleTP8.JPG', camera)
			let sSalleTp1 = new Scene('RDC/salleTP1.JPG', camera)
			let sCouloirTp = new Scene('RDC/couloirTp.JPG', camera)
			let sSalleTp2 = new Scene('RDC/salleTP2.JPG', camera)
			let sentreCL3 = new Scene('RDC/entreCL3.JPG', camera)
			let sEntreInt = new Scene('RDC/entreInt.JPG', camera)
			let sBasEscalier = new Scene('RDC/basEscalier.JPG', camera)
			let sHallCl3 = new Scene('RDC/Hallcl3.JPG', camera)
			let sEscalierHall = new Scene('RDC/escalierHall.JPG', camera)
			let sCouloirPft = new Scene('RDC/couloirPft.JPG', camera)
			let sPft1 = new Scene('RDC/PFT.JPG', camera)
			let sPft2 = new Scene('RDC/PFT2.JPG', camera)
			let scouloir = new Scene('couloirAmphi.JPG', camera)
			let sAmphi1 = new Scene('amphi.JPG', camera)
			let sAmphi2 = new Scene('amphi2.JPG', camera)

			//Point sur les scène
			s.addPoint({
				position: new THREE.Vector3(3.3425917954582585, -4.3557951682028975, 9.482916033562756),
				name: '',
				scene: sHall,
				image: 'rond.png'
			})
			sHall.addPoint({
				position: new THREE.Vector3(5.586655480442088, -2.8808708566302292, -8.980354602334508),
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
				position: new THREE.Vector3(4.822546791467821, -2.178132994648537, 9.587412499673036),
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
			sCouloirFablab.addPoint({
				position: new THREE.Vector3(5.975992630871764, -2.940147274283004, 8.728977306896573),
				name: '',
				scene: sSalleTp1,
				image: 'door.png'
			})
			sSalleTp1.addPoint({
				position: new THREE.Vector3(7.7029692607012645, -0.47943490156151125, -7.809571327214472),
				name: '',
				scene: sCouloirFablab,
				image: 'rond.png'
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

			let sEsca = new Scene('1ETAGE/esca.JPG', camera)

			//Points sur les scènes
			sHall.addPoint({
				position: new THREE.Vector3(10.251038348414493, 0.5594536699060717, -3.8239983539078093),
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
				position: new THREE.Vector3(0.11094661191489386, 0.05822983483518479, 10.98621206434346),
				name: '',
				scene: sAmphi1,
				image: 'door.png'
			})
			scouloir.addPoint({
				position: new THREE.Vector3(-9.674788445593292, 0.90595184543966, -5.028329450913663),
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
				position: new THREE.Vector3(-5.589198294369736, -2.4369864395013403, 9.104462363081907),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(10.375858243835738, -0.8348387889943012, -3.3661414049528227),
				name: '',
				scene: sBasEscalier,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(10.922767575221854, 0.4989254686452473, -0.5352932700198354),
				name: '',
				scene: sHallCl3,
				image: 'arrowright.png'
			})
			sHallCl3.addPoint({
				position: new THREE.Vector3(4.069968162365029, 0.9900658057402745, -10.154424237416915),
				name: '',
				scene: sEntreInt,
				image: 'arrowleft.png'
			})
			sHallCl3.addPoint({
				position: new THREE.Vector3(-5.535531965700705, 0.07319661154081303, 9.449847790601774),
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
			sCouloirPft.addPoint({
				position: new THREE.Vector3(1.6498211601489308, -1.7501430231955566, 10.684863441605522),
				name: '',
				scene: sPft2,
				image: 'door.png'
			})
			sPft1.addPoint({
				position: new THREE.Vector3(-7.5758453559138434, -4.334841165971625, 6.618201948698681),
				name: 'Sortie ',
				scene: sCouloirPft,
				image: 'rond.png'
			})
			sPft2.addPoint({
				position: new THREE.Vector3(-8.812769573598704, -1.5327225002847635, -6.328656030427126),
				name: 'Sortie ',
				scene: sCouloirPft,
				image: 'arrowleft.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(7.224294973613481, -2.885728612715119, -7.722071586077687),
				name: 'Entrée du batiment ',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sBasEscalier.addPoint({
				position: new THREE.Vector3(-6.9304124664476845, -5.232361305197751, 6.729430454887892),
				name: 'Entrée du  ',
				scene: scouloir,
				image: 'rond.png'
			})
			scouloir.addPoint({
				position: new THREE.Vector3(-6.635854339035398, -1.567699177723833, -8.553979079270746),
				name: 'Entrée du  ',
				scene: sBasEscalier,
				image: 'rond.png'
			})

			//Abel de Claudin 1 / Rez de chaussé
			//Déclaration des scène
			let sEtage1CouloirConseil = new Scene('1ETAGE/couloirSalleConseil.JPG', camera)
			let sEtage1CouloirCentral = new Scene('1ETAGE/couloirCentral.JPG', camera)
			let sEtage1CouloirPLP = new Scene('1ETAGE/couloirPLP.JPG', camera)
			let sEtage1PLP = new Scene('1ETAGE/PLP.JPG', camera)
			let sEtage1Conseil = new Scene('1ETAGE/Conseil.JPG', camera)

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
				position: new THREE.Vector3(-9.199905097868442, 1.0379466245803326, -5.903083803299032),
				name: 'Entrée du batiment ',
				scene: sEtage1CouloirCentral,
				image: 'rond.png'
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
				s.createScene(scene)
				s.destroy()
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
				sHallCl3.createScene(scene)
				s.destroy()
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