<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visite virtuelle - Batiment Abel de Pujol 2</title>
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
		<img src="tp/aip.png" style="width: 100%;" onclick="aip()">
		<img src="tp/etage1.png" style="width: 100%;" onclick="etage1()">
	</div>
	<!-- Page qui s'affiche a chaque entrée de batiment -->
	<div onclick="Layer();logoInsa();">
		<img id="layer" src="layer.jpg" alt="">
	</div>

	<!-- Logo Insa en haut a gauche -->
	<div id="logoinsa" style="display: none;">
		<a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
	</div>

	<div id="absorption" style="display: none;" onclick="absorption();">
		<div id="containerInfo">
			<div class="zoom">
				<img src="Info/spectrophometre_absorption.jpg" id="imginfra" alt="" onclick="window.open(this.src)">
			</div>
		</div>
	</div>

	<!--
	<img src="rdc.png" alt="Map" title="Map" usemap="#map" id="minimap" style="display: none;" />
	<img src="../textures/ArrowUp.png" id="arrowUp" onclick="changeImage()" style="display: none;" />
	<map name="map">
		<area onclick="aip();" shape="poly" coords="329,75,347,107,400,106,371,84,336,84" shape="poly" style="display: none;">
		<area onclick="etage1();" shape="poly" coords="145,75,264,70,270,92,266,107,268,115,244,117,243,102,143,106" alt="Couloir" style="display: none;" />
	</map>
-->

	<svg id="minimap" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
		<image width="1920" height="1080" xlink:href="rdc.png"></image> <a xlink:href="#">
			<rect id="aip" x="248" y="373" fill="#fff" opacity="0" width="465" height="281" onclick="aip();"></rect>
		</a>
		<a xlink:href="#">
			<rect id="etage1" x="448" y="313" fill="#fff" opacity="0" width="999" height="281" onclick="etage1();"></rect>
		</a>
	</svg>
	<img src="../textures/ArrowUp.png" id="arrowUp" onclick="changeImage()" style="display: none;" />

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
				document.getElementById("etage1").style.display = 'block';
				document.getElementById("aip").style.display = 'none';
			} else {
				image.setAttribute('href', "rdc.png")
				document.getElementById("etage1").style.display = 'none';
				document.getElementById("aip").style.display = 'block';
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
			document.getElementById("etage1").style.display = 'none';

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
			camera.position.set(1, 0, 0)
			controls.update()

			let s = new Scene('RDC/entreeExt.JPG', camera)
			let sEntreInt = new Scene('RDC/EntreInt.JPG', camera)
			let sAmphi2 = new Scene('RDC/Amphi2.JPG', camera)
			let sEscaAmphi = new Scene('RDC/EscaAmphi.JPG', camera)
			let sHall = new Scene('RDC/Hall.JPG', camera)
			let sEntreAIP = new Scene('RDC/entreAIP.JPG', camera)
			let sCouloirDroitAIP = new Scene('RDC/CouloirDroiteAIP.JPG', camera)
			let sCouloirGaucheAIP = new Scene('RDC/CouloirGaucheAIP.JPG', camera)
			let smachineAIP = new Scene('RDC/MachineAIP.JPG', camera)
			let sMilieuAIP = new Scene('RDC/MilieuAIP.JPG', camera)
			let scouloirGestionProd = new Scene('RDC/CouloirGestionProd.JPG', camera)
			let sGestionProd = new Scene('RDC/GestionProd.JPG', camera)
			let sphimx = new Scene('RDC/sphimx.JPG', camera)
			let imprimante = new Scene('RDC/salleImprimante.JPG', camera)
			let Couloir20E = new Scene('RDC/couloir20E.JPG', camera)


			//Point sur les scène
			s.addPoint({
				position: new THREE.Vector3(-10.353341902131765, -2.259340456493337, 2.7590220236283063),
				name: '',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(-1.0158227864341307, -4.829592963667954, 9.769351182794129),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(-5.254969088170765, -0.7056820119272412, -9.564749191920772),
				name: '',
				scene: sAmphi2,
				image: 'door.png'
			})
			sAmphi2.addPoint({
				position: new THREE.Vector3(1.8649690847387383, -0.38548399223475427, -10.797378932950876),
				name: '',
				scene: sEntreInt,
				image: 'arrowleft.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(10.801085658915948, -1.7901053134051645, 0.40961373412647206),
				name: '',
				scene: sEscaAmphi,
				image: 'rond.png'
			})
			sEscaAmphi.addPoint({
				position: new THREE.Vector3(4.717289624381983, -1.6645135139768574, 9.733351555341859),
				name: '',
				scene: sEntreInt,
				image: 'arrowleft.png'
			})
			sEscaAmphi.addPoint({
				position: new THREE.Vector3(-10.545257539491402, -2.435552253852481, -1.7346641544801706),
				name: '',
				scene: sHall,
				image: 'rond.png'
			})
			sHall.addPoint({
				position: new THREE.Vector3(-8.893781814838539, -4.014913926702677, 4.9627380951274676),
				name: '',
				scene: sEscaAmphi,
				image: 'rond.png'
			})
			sHall.addPoint({
				position: new THREE.Vector3(-6.495598237675756, -0.9130056831258822, -8.77301330882821),
				name: '',
				scene: sphimx,
				image: 'door.png'
			})
			sphimx.addPoint({
				position: new THREE.Vector3(-10.492672030404865, -0.730059196336525, 2.9987049860763326),
				name: '',
				scene: sHall,
				image: 'door.png'
			})
			sHall.addPoint({
				position: new THREE.Vector3(10.22050625694429, -3.8448081426320138, -0.7377656157561647),
				name: '',
				scene: sEntreAIP,
				image: 'rond.png'
			})
			sEntreAIP.addPoint({
				position: new THREE.Vector3(-9.934288333883657, -4.448529099326684, 1.1710928560307028),
				name: '',
				scene: sHall,
				image: 'rond.png'
			})
			sEntreAIP.addPoint({
				position: new THREE.Vector3(-6.014317871162761, 0.5857122470604142, 9.165519409668809),
				name: '',
				scene: imprimante,
				image: 'door.png'
			})
			imprimante.addPoint({
				position: new THREE.Vector3(9.603651139162, -0.8089175198224051, 5.171481794445314),
				name: '',
				scene: sEntreAIP,
				image: 'door.png'
			})
			sEntreAIP.addPoint({
				position: new THREE.Vector3(10.780142583377746, 0.9529082060532503, -1.7569442411375693),
				name: '',
				scene: smachineAIP,
				image: 'door.png'
			})
			smachineAIP.addPoint({
				position: new THREE.Vector3(10.910547228128326, -0.21772079147413015, -0.7996312199401366),
				name: '',
				scene: sEntreAIP,
				image: 'door.png'
			})
			smachineAIP.addPoint({
				position: new THREE.Vector3(-10.631400846037549, 0.4068431484887589, 2.595813801308749),
				name: '',
				scene: sMilieuAIP,
				image: 'door.png'
			})
			sMilieuAIP.addPoint({
				position: new THREE.Vector3(-10.61152732356333, 0.20366939958291586, -2.695547242161575),
				name: '',
				scene: smachineAIP,
				image: 'door.png'
			})
			sEntreAIP.addPoint({
				position: new THREE.Vector3(9.02858594667922, -4.660434005031487, 4.113300331406872),
				name: '',
				scene: sCouloirDroitAIP,
				image: 'rond.png'
			})
			sCouloirDroitAIP.addPoint({
				position: new THREE.Vector3(9.534844286494364, -4.9315477191602906, -2.2378424990724994),
				name: '',
				scene: sEntreAIP,
				image: 'rond.png'
			})
			sEntreAIP.addPoint({
				position: new THREE.Vector3(2.042292344217059, -3.7568578796291403, -10.117743639460508),
				name: '',
				scene: sCouloirGaucheAIP,
				image: 'rond.png'
			})
			sCouloirGaucheAIP.addPoint({
				position: new THREE.Vector3(-7.683104189334822, -0.4231440027032326, 7.829434336016551),
				name: '',
				scene: sEntreAIP,
				image: 'arrowleft.png'
			})
			sCouloirGaucheAIP.addPoint({
				position: new THREE.Vector3(-2.104239762761464, -1.9206428044349522, -10.614815783372565),
				name: '',
				scene: Couloir20E,
				image: 'door.png'
			})
			Couloir20E.addPoint({
				position: new THREE.Vector3(-2.590201534942737, -1.5129545077391804, 10.531735103418603),
				name: '',
				scene: sCouloirGaucheAIP,
				image: 'door.png'
			})
			sCouloirGaucheAIP.addPoint({
				position: new THREE.Vector3(10.45526434432478, -3.2530554433990235, 0.5039836339257315),
				name: '',
				scene: scouloirGestionProd,
				image: 'rond.png'
			})
			scouloirGestionProd.addPoint({
				position: new THREE.Vector3(-10.57090395258795, -2.5814482031833443, 1.1032284794214475),
				name: '',
				scene: sCouloirGaucheAIP,
				image: 'rond.png'
			})
			scouloirGestionProd.addPoint({
				position: new THREE.Vector3(-4.83856540071222, -0.2022993043561494, -9.815227272161207),
				name: '',
				scene: sGestionProd,
				image: 'door.png'
			})
			sGestionProd.addPoint({
				position: new THREE.Vector3(1.8650800214111731, -0.11553878700373937, -10.810629613087825),
				name: '',
				scene: scouloirGestionProd,
				image: 'door.png'
			})

			///-------------------Déclaration des scènes de AB2-Etage 1
			let sEtage1Couloir = new Scene('1ETAGE/CouloirEsca.JPG', camera)
			let sEtage1CouloirAmphi = new Scene('1ETAGE/CouloirAmphi.JPG', camera)
			let sEtage1CouloirApple = new Scene('1ETAGE/CouloirDevApple.JPG', camera)
			let sEtage1Apple = new Scene('1ETAGE/DevApple.JPG', camera)

			//Point sur les scène
			sEntreAIP.addPoint({
				position: new THREE.Vector3(-0.12851516512122374, -0.1625315981486809, 10.979357694194984),
				name: '',
				scene: sEtage1Couloir,
				image: 'rond.png'
			})

			sEtage1Couloir.addPoint({
				position: new THREE.Vector3(1.6764993715112908, -4.53625138213997, 9.843020518925117),
				name: '',
				scene: sEntreAIP,
				image: 'rond.png'
			})

			sEscaAmphi.addPoint({
				position: new THREE.Vector3(10.893841042915724, -0.19818068953064982, -0.9789984955155999),
				name: '',
				scene: sEtage1CouloirAmphi,
				image: 'rond.png'
			})

			sEtage1CouloirAmphi.addPoint({
				position: new THREE.Vector3(-7.93029082955154, -6.671762127314951, 3.5947354450547255),
				name: '',
				scene: sEscaAmphi,
				image: 'rond.png'
			})

			sEtage1Couloir.addPoint({
				position: new THREE.Vector3(10.942416933054691, 0.009455200226083482, 0.5799345453537494),
				name: '',
				scene: sEtage1CouloirApple,
				image: 'arrowleft.png'
			})
			sEtage1CouloirApple.addPoint({
				position: new THREE.Vector3(10.131334195293418, -3.3126652876878264, -2.5423681564816185),
				name: '',
				scene: sEtage1CouloirAmphi,
				image: 'rond.png'
			})
			sEtage1CouloirApple.addPoint({
				position: new THREE.Vector3(-8.351983353444748, -6.5148394635761, 2.7969449477026176),
				name: '',
				scene: sEtage1Couloir,
				image: 'rond.png'
			})
			sEtage1CouloirAmphi.addPoint({
				position: new THREE.Vector3(8.949764322045262, -0.9091360139060447, 6.280524552602076),
				name: '',
				scene: sEtage1CouloirApple,
				image: 'arrowright.png'
			})
			sEtage1CouloirApple.addPoint({
				position: new THREE.Vector3(6.937099538668737, -0.4700564312883998, 8.438697667313503),
				name: '',
				scene: sEtage1Apple,
				image: 'door.png'
			})
			sEtage1Apple.addPoint({
				position: new THREE.Vector3(-10.808138737548314, -1.2488512576862716, 1.1531735317733323),
				name: '',
				scene: sEtage1CouloirApple,
				image: 'arrowleft.png'
			})


			s.createScene(scene)
			s.appear()

			window.etage1 = function() {
				sEtage1CouloirAmphi.createScene(scene)
				s.destroy()
				sEntreInt.destroy()
				sAmphi2.destroy()
				sEscaAmphi.destroy()
				sHall.destroy()
				sEntreAIP.destroy()
				sCouloirDroitAIP.destroy()
				sCouloirGaucheAIP.destroy()
				sEtage1Couloir.destroy()
				sEtage1CouloirAmphi.destroy()
				sEtage1CouloirApple
				sEtage1Apple.destroy()
				smachineAIP.destroy()
				sMilieuAIP.destroy()
				scouloirGestionProd.destroy()
				sGestionProd.destroy()
				sphimx.destroy()
				imprimante.destroy()
			}
			window.aip = function() {
				sEntreAIP.createScene(scene)
				s.destroy()
				sEntreInt.destroy()
				sAmphi2.destroy()
				sEscaAmphi.destroy()
				sHall.destroy()
				sEntreAIP.destroy()
				sCouloirDroitAIP.destroy()
				sCouloirGaucheAIP.destroy()
				sEtage1Couloir.destroy()
				sEtage1CouloirAmphi.destroy()
				sEtage1CouloirApple
				sEtage1Apple.destroy()
				smachineAIP.destroy()
				sMilieuAIP.destroy()
				scouloirGestionProd.destroy()
				sGestionProd.destroy()
				sphimx.destroy()
				imprimante.destroy()
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