<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visite virtuelle - Batiment Abel de Pujol 3</title>
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
        <img src="tp/rdc.png" style="width: 100%;" onclick="RDC()">
        <img src="tp/etage1.png" style="width: 100%;" onclick="etage1()">
        <img src="tp/etage2.png" style="width: 100%;" onclick="etage2()">
    </div>
	<!-- Page qui s'affiche a chaque entrée de batiment -->
	<div onclick="Layer();logoInsa();">
		<img id="layer" src="layer.jpg" alt="">
	</div>

	<!-- Logo Insa en haut a gauche -->
	<div id="logoinsa" style="display: none;">
		<a href="https://www.uphf.fr/insa-hdf"><img src="../textures/logoinsa.png" style="width: 100%;"></a>
	</div>

	<!--
	<map name="ab3">
		<area onclick="RDC();" shape="poly" coords="168,64,165,116,246,119,238,65" alt="Couloir" style="display: none;" />
		<area onclick="etage1();" shape="poly" coords="103,19,77,144,132,143,138,62,115,60,119,19" alt="Couloir" style="display: none;" />
		<area onclick="etage2();" shape="poly" coords="302,10,321,10,314,150,281,150" alt="Couloir" style="display: none;" />
	</map>
-->

	<svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
		<image width="1920" height="1080" xlink:href="rdc.png"></image> <a xlink:href="#">
			<rect id="rdc" x="986" y="108" fill="#fff" opacity="0" width="645" height="452" onclick="RDC();"></rect>
		</a><a xlink:href="#">
			<rect id="etage1" x="1135" y="130" fill="#fff" opacity="0" width="347" height="660" onclick="etage1();"></rect>
		</a>
		<a xlink:href="#">
			<rect id="etage2" x="172" y="344" fill="#fff" opacity="0" width="1614" height="274" onclick="etage2();"></rect>
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
				document.getElementById("rdc").style.display = 'none';
				document.getElementById("etage2").style.display = 'none';

			} else if (image.href.animVal == 'etage1.png') {
				image.setAttribute('href', "etage2.png");
				document.getElementById("etage1").style.display = 'none';
				document.getElementById("rdc").style.display = 'none';
				document.getElementById("etage2").style.display = 'block';

			} else {
				image.setAttribute('href', "rdc.png")
				document.getElementById("rdc").style.display = 'block';
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
            document.getElementById("etage1").style.display = 'none';
            document.getElementById("etage2").style.display = 'none';


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

			let s = new Scene('RDC/entreExt.JPG', camera)
			let sEntreInt = new Scene('RDC/entreInt.JPG', camera)
			let sCouloirH = new Scene('RDC/couloirHall.JPG', camera)
			let sCouloirElectronique = new Scene('RDC/couloirElectronique.JPG', camera)
			let sCouloirContuinite = new Scene('RDC/couloirContinuite.JPG', camera)
			let sCouloirContuinite1 = new Scene('RDC/couloirContinuite1.JPG', camera)
			let sCouloirContuinite2 = new Scene('RDC/couloirContinuite2.JPG', camera)
			let sCouloirContuinite3 = new Scene('RDC/couloirContinuite3.JPG', camera)
			let sSalleElec = new Scene('RDC/salleElec.JPG', camera)
			let sSalleReseau = new Scene('RDC/salleReseau.JPG', camera)
			let sSalleAutomatisme = new Scene('RDC/salleAutomatisme.JPG', camera)
			let sModule = new Scene('ap3Module.JPG', camera)


			//Point sur les scène
			s.addPoint({
				position: new THREE.Vector3(-10.869110458147556, -1.2338391329068525, -0.5567277081104994),
				name: '',
				scene: sEntreInt,
				image: 'rond.png'
			})
			s.addPoint({
				position: new THREE.Vector3(6.480561829892239, 0.4072163438560642, 8.817342667585349),
				name: '',
				scene: sModule,
				image: 'door.png'
			})
			sModule.addPoint({
				position: new THREE.Vector3(-6.968480960407255, -0.14281885786743995, -8.433640051113311),
				name: '',
				scene: s,
				image: 'door.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(5.623505306584677, -3.1238519699229843, -8.891977694638026),
				name: '',
				scene: s,
				image: 'rond.png'
			})
			sEntreInt.addPoint({
				position: new THREE.Vector3(-10.90301260739323, -1.3432282624409015, -0.04776502313076482),
				name: '',
				scene: sCouloirH,
				image: 'rond.png'
			})
			sCouloirH.addPoint({
				position: new THREE.Vector3(9.472049139150277, -4.532699567050274, 3.0915708407858276),
				name: '',
				scene: sEntreInt,
				image: 'rond.png'
			})
			sCouloirH.addPoint({
				position: new THREE.Vector3(-10.063249617592847, -3.007419425589138, -3.072920168695754),
				name: '',
				scene: sCouloirElectronique,
				image: 'rond.png'
			})
			sCouloirElectronique.addPoint({
				position: new THREE.Vector3(7.730164775507301, 0.7835148727064173, -7.768020734603477),
				name: '',
				scene: sCouloirH,
				image: 'arrowright.png'
			})
			sCouloirElectronique.addPoint({
				position: new THREE.Vector3(10.196833897330999, -1.421268162772054, -3.7408495019465726),
				name: '',
				scene: sCouloirContuinite,
				image: 'rond.png'
			})
			sCouloirContuinite.addPoint({
				position: new THREE.Vector3(-10.516482971575622, -1.4585209780221118, 2.6681625398216773),
				name: '',
				scene: sCouloirElectronique,
				image: 'rond.png'
			})
			sCouloirContuinite.addPoint({
				position: new THREE.Vector3(10.666058718631433, -1.2465310132535465, -2.2828831533151765),
				name: '',
				scene: sCouloirContuinite1,
				image: 'rond.png'
			})
			sCouloirContuinite1.addPoint({
				position: new THREE.Vector3(10.903294194702424, 0.3935993138449596, 0.7855451255453205),
				name: '',
				scene: sCouloirContuinite,
				image: 'arrowright.png'
			})
			sCouloirContuinite1.addPoint({
				position: new THREE.Vector3(-10.52346772885097, -2.8674377128624764, 0.8575170821011289),
				name: '',
				scene: sCouloirContuinite2,
				image: 'rond.png'
			})
			sCouloirContuinite2.addPoint({
				position: new THREE.Vector3(10.534605426744927, -2.5671365106424466, -1.508170580115674),
				name: '',
				scene: sCouloirContuinite1,
				image: 'rond.png'
			})
			sCouloirContuinite2.addPoint({
				position: new THREE.Vector3(-10.646011395441231, -2.851071468106518, 1.3762571395656888),
				name: '',
				scene: sCouloirContuinite3,
				image: 'rond.png'
			})
			sCouloirContuinite3.addPoint({
				position: new THREE.Vector3(1.7049581929672395, -1.4509627929304532, -10.723812244219792),
				name: '',
				scene: sCouloirContuinite2,
				image: 'rond.png'
			})
			sCouloirContuinite3.addPoint({
				position: new THREE.Vector3(-10.848168856293961, 1.6534922132693175, 0.1373205124477279),
				name: '',
				scene: sSalleElec,
				image: 'door.png'
			})
			sSalleElec.addPoint({
				position: new THREE.Vector3(-5.158742143811038, -6.091693093934952, 7.556342600336504),
				name: '',
				scene: sCouloirContuinite3,
				image: 'rond.png'
			})
			sCouloirElectronique.addPoint({
				position: new THREE.Vector3(-5.278020555322601, 1.6957505451934065, 9.428406010536396),
				name: '',
				scene: sSalleReseau,
				image: 'door.png'
			})

			sSalleReseau.addPoint({
				position: new THREE.Vector3(4.495879682511349, -0.2421017171922418, 9.996190145085208),
				name: '',
				scene: sCouloirElectronique,
				image: 'door.png'
			})
			sCouloirContuinite1.addPoint({
				position: new THREE.Vector3(10.864436713107068, 0.5052843449541481, -1.1243647515393767),
				name: '',
				scene: sSalleAutomatisme,
				image: 'door.png'
			})
			sSalleAutomatisme.addPoint({
				position: new THREE.Vector3(0.4009858253988052, -3.7710953740912245, 10.280051063658922),
				name: '',
				scene: sCouloirContuinite1,
				image: 'rond.png'
			})


			//Abel de pujol 3 / Etage 1 ---------------------------- MANQUE DES PHOTOS ! A NE PAS OUBLIER
			//Déclaration des scène
			let sEtage1Esca = new Scene('1ETAGE/Esca.JPG', camera)

			//Point sur les scène
			sEntreInt.addPoint({
				position: new THREE.Vector3(-10.2821633408239, 0.2568192656459418, 3.772363175251246),
				name: '',
				scene: sEtage1Esca,
				image: 'arrowright.png'
			})
			sEtage1Esca.addPoint({
				position: new THREE.Vector3(8.614606633842147, -2.713483402382425, -6.204419986400512),
				name: '',
				scene: sEntreInt,
				image: 'arrowright.png'
			})


			//Abel de pujol 3 / Etage 1.5
			//Déclaration des scène
			let sEtageSemiEsca = new Scene('SEMI/esca.JPG', camera)
			let sEtageSemiCouloir109 = new Scene('SEMI/couloir109.JPG', camera)
			let sEtageSemiCouloir110 = new Scene('SEMI/couloir110.JPG', camera)
			let sEtageSemiSalle111 = new Scene('SEMI/salleInfo111.JPG', camera)

			//Point sur les scène
			sEtage1Esca.addPoint({
				position: new THREE.Vector3(7.863004426550042, -6.18058480632246, 4.489669209190303),
				name: '',
				scene: sEtageSemiEsca,
				image: 'rond.png'
			})
			sEtageSemiEsca.addPoint({
				position: new THREE.Vector3(-1.155353828656003, -4.039807654424862, -10.1096054620231),
				name: '',
				scene: sEtage1Esca,
				image: 'rond.png'
			})
			sEtageSemiEsca.addPoint({
				position: new THREE.Vector3(9.738333921623969, -4.680042736015681, -1.9748340896213483),
				name: '',
				scene: sEtageSemiCouloir109,
				image: 'rond.png'
			})
			sEtageSemiCouloir109.addPoint({
				position: new THREE.Vector3(-10.319995276714641, -3.3287780131311817, -1.6023080783519978),
				name: '',
				scene: sEtageSemiEsca,
				image: 'arrowright.png'
			})
			sEtageSemiCouloir109.addPoint({
				position: new THREE.Vector3(10.28751859826333, -3.28078303906094, 2.0666058845890425),
				name: '',
				scene: sEtageSemiCouloir110,
				image: 'rond.png'
			})
			sEtageSemiCouloir110.addPoint({
				position: new THREE.Vector3(-9.821270078995559, -3.1888071607932784, -3.7148542426199818),
				name: '',
				scene: sEtageSemiCouloir109,
				image: 'rond.png'
			})
			sEtageSemiCouloir110.addPoint({
				position: new THREE.Vector3(-8.07728585010123, -1.5596137959666065, 7.218588376070576),
				name: '',
				scene: sEtageSemiSalle111,
				image: 'door.png'
			})
			sEtageSemiSalle111.addPoint({
				position: new THREE.Vector3(3.1498996323797583, -0.11296204909194318, 10.478335307996257),
				name: '',
				scene: sEtageSemiCouloir110,
				image: 'rond.png'
			})

			//Abel de pujol 3 / Etage 1.5
			//Déclaration des scène
			let sEtage2Esca = new Scene('2ETAGE/esca.JPG', camera)
			let sEtage2Couloir201 = new Scene('2ETAGE/couloir201.JPG', camera)
			let sEtage2Couloir203 = new Scene('2ETAGE/couloir203.JPG', camera)
			let sEtage2Salle203 = new Scene('2ETAGE/salleInfo203.JPG', camera)

			//Point sur les scène
			sEtageSemiEsca.addPoint({
				position: new THREE.Vector3(4.868036320675584, 2.0915918120796055, -9.581288426863122),
				name: '',
				scene: sEtage2Esca,
				image: 'arrowleft.png'
			})
			sEtage2Esca.addPoint({
				position: new THREE.Vector3(6.940246650623798, -3.0720632487085195, 7.895094649134811),
				name: '',
				scene: sEtageSemiEsca,
				image: 'arrowright.png'
			})
			sEtage2Esca.addPoint({
				position: new THREE.Vector3(-10.750673127100148, -1.885027155073665, 0.7784994056188562),
				name: '',
				scene: sEtage2Couloir201,
				image: 'rond.png'
			})
			sEtage2Couloir201.addPoint({
				position: new THREE.Vector3(1.748885192037375, -2.220300938897936, -10.597774486567202),
				name: '',
				scene: sEtage2Esca,
				image: 'rond.png'
			})
			sEtage2Couloir201.addPoint({
				position: new THREE.Vector3(-1.0007496318996592, -2.7875286178541923, 10.529376350242405),
				name: '',
				scene: sEtage2Couloir203,
				image: 'rond.png'
			})
			sEtage2Couloir203.addPoint({
				position: new THREE.Vector3(1.3199601004346566, -2.593786970091812, -10.546466574204182),
				name: '',
				scene: sEtage2Couloir201,
				image: 'rond.png'
			})
			sEtage2Couloir203.addPoint({
				position: new THREE.Vector3(9.234157120310416, 0.10697028320819121, -5.935557981539278),
				name: '',
				scene: sEtage2Salle203,
				image: 'door.png'
			})
			sEtage2Salle203.addPoint({
				position: new THREE.Vector3(6.636035699081096, 0.04026790728551466, 8.7129567882181),
				name: '',
				scene: sEtage2Couloir203,
				image: 'rond.png'
			})

			s.createScene(scene)
			s.appear()

			window.RDC = function() {
				sCouloirH.createScene(scene)
				s.destroy()
				sEntreInt.destroy()
				sCouloirH.destroy()
				sCouloirElectronique.destroy()
				sCouloirContuinite.destroy()
				sCouloirContuinite1.destroy()
				sCouloirContuinite2.destroy()
				sCouloirContuinite3.destroy()
				sSalleElec.destroy()
				sSalleReseau.destroy()
				sSalleAutomatisme.destroy()
				sEtageSemiEsca.destroy()
				sEtageSemiCouloir109.destroy()
				sEtageSemiCouloir110.destroy()
				sEtageSemiSalle111.destroy()
				sEtage2Esca.destroy()
				sEtage2Couloir201.destroy()
				sEtage2Couloir203.destroy()
				sEtage2Salle203.destroy()
				sEtage1Esca.destroy()
			}
			window.etage1 = function() {
				sEtage1Esca.createScene(scene)
				s.destroy()
				sEntreInt.destroy()
				sCouloirH.destroy()
				sCouloirElectronique.destroy()
				sCouloirContuinite.destroy()
				sCouloirContuinite1.destroy()
				sCouloirContuinite2.destroy()
				sCouloirContuinite3.destroy()
				sSalleElec.destroy()
				sSalleReseau.destroy()
				sSalleAutomatisme.destroy()
				sEtageSemiEsca.destroy()
				sEtageSemiCouloir109.destroy()
				sEtageSemiCouloir110.destroy()
				sEtageSemiSalle111.destroy()
				sEtage2Esca.destroy()
				sEtage2Couloir201.destroy()
				sEtage2Couloir203.destroy()
				sEtage2Salle203.destroy()
				sEtage1Esca.destroy()
			}
			window.etage2 = function() {
				sEtage2Esca.createScene(scene)
				s.destroy()
				sEntreInt.destroy()
				sCouloirH.destroy()
				sCouloirElectronique.destroy()
				sCouloirContuinite.destroy()
				sCouloirContuinite1.destroy()
				sCouloirContuinite2.destroy()
				sCouloirContuinite3.destroy()
				sSalleElec.destroy()
				sSalleReseau.destroy()
				sSalleAutomatisme.destroy()
				sEtageSemiEsca.destroy()
				sEtageSemiCouloir109.destroy()
				sEtageSemiCouloir110.destroy()
				sEtageSemiSalle111.destroy()
				sEtage2Esca.destroy()
				sEtage2Couloir201.destroy()
				sEtage2Couloir203.destroy()
				sEtage2Salle203.destroy()
				sEtage1Esca.destroy()
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