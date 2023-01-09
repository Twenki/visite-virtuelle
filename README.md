# visite-virtuelle
Code source de la visite virtuelle

# Visite-virtuelle-insahdf.fr

Visite virtuelle de l'INSA Hauts-de-france
lien : https://visite-virtuelle-insahdf.fr


## Script utilisé

```javascript
<script src="../three.js"></script>
    <script src="../TweenLite.js"></script>
    <script src="../SpriteMixer.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/EaselPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/CustomEase.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
```


## Explication du code / HTML

Google analytics
```javascript

<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HYLJZEMJB"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-7HYLJZEMJB');
</script>

```

Navigation en haut de l'écran (menu déroulant)
```html
<nav>
    <ul>
        <img src="RDC/hall2.jpg" style="width: 10%;" onclick="hall()">
        <img src="1ETAGE/couloircentreaide.jpg" style="width: 10%;" onclick="CentreAide()">
        <img src="2ETAGE/sallepc4.jpg" style="width: 10%;" onclick="etage2()">
    </ul>
</nav>
```

Barre de logo en bas de l'écran 
```html
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
```

Logo en haut a droite permettant un déplacement rapide
```html
<div id="logo">
        <img src="tp/scientifique.png" style="width: 100%;" onclick="etage2()">
        <img src="tp/fablab.png" style="width: 100%;" onclick="CentreAide()">
        <img src="tp/hall.png" style="width: 100%;" onclick="hall()">
    </div>
```

Photo qui s'affiche a chaque entrée de bâtiments 
```html
<div onclick="Layer();logoInsa();">
    <img id="layer" src="layer.jpg" alt="">
</div>
```

Logo Insa en haut a gauche
```html
<div id="logoinsa" style="display: none;">
    <a href="https://www.uphf.fr/insa-hdf"><img id="roundinsa" src="../textures/logoinsa.png" style="width: 100%;"></a>
</div>
```

Minimap :

```html
<svg id="minimap" version="1.1" style="display: none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080" onclick="openmap(); arrowUp();">
    <image width="1920" height="1080" xlink:href="rdc.png"></image>
</svg>
<img src="../textures/arrowup.png" id="arrowUp" onclick="changeImage()" style="display: none;" />
```


## Explication du code / PHP
On utilise une base de donnée pour Afficher et gérer les point d'information.

Point d'information : On retrouve le texte ainsi que le zoom dispo sur chaque photo inclus dans le point d'info

```php
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
    ```

On récupère aussi la map en PHP qui est en SVG a la base :

```php
<div class="mapAndInfos">
        <div class="map">
            <?php include('../ressources/map.svg'); ?>
        </div>
</div>
```
## Explication du code / Javascript - Fonctions

Fonction plein écran :

```javascript
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
```

Fonction pour changer d'étage sur la minimap
```javascript
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
```

Apparition de la carte du campus
```javascript
function maFonction() {
            var div = document.getElementById("maDIV");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
```

Apparition du batiment en 3D
```javascript
function openmap() {
            var div = document.getElementById("minimap");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
```
Apparition de la fleche permettant de changer d'étage dans la carte en 3D
```javascript
function arrowUp() {
            var div = document.getElementById("arrowUp");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
```
Apparition d'un point d'information
```javascript
        function Infrarouge() {
            var div = document.getElementById("Infrarouge");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
```

Apparition de l'image a chaque entré de bâtiment
```javascript
function Layer() {
            var div = document.getElementById("layer");
            if (div.style.display === "fixed") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }

        }
```
Logo situé en haut a gauche
```javascript

        function logoInsa() {
            var div = document.getElementById("logoinsa");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
```
Haut de page contenant les accés rapide
```javascript

        function slider() {
            var div = document.getElementById("scene");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

```



## Explication du code / Javascript - THREEJS
Pour bien comprendre il faut se référer a la docs THREEJS

Ce qui suit ne doit pas être toucher
On trouve la création de class, de la scene actuelle, des point permettant de voyage de scene en scene
Une fonction pour détruire l'image donc allégé le code et une fonction pour faire apparaite les images

```javascript
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
```

Ce qui suit peu etre modifié 
On trouve les paramétre de caméra comme par exemple le zoom, la vitesse de rotation, la rotation automatique et autres.. (Se référer a la doc)

```javascript
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
```

Création d'une scene :
- Déclaration de la scène + de l'image :

```javascript
let s = new Scene('RDC/entre.jpg', camera)
let sHall = new Scene('RDC/hallprincipal.jpg', camera)
...

```
- Création du point sur la scene et le changement d'image 
    - On ajoute les coordonnée du point pour le placer et on lui donne une scene ou aller puis on lui ajoute l'image a cliquer pour voyager

```javascript
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
```

Très important de Créer la scene et de la faire apparaitre a la fin :

```javascript
s.createScene(scene)
s.appear()
```

Pour les point d'information il est aussi très important de créer une intersection pour pouvoir ouvrir le point d'info
On doit lui spécifier le nom exacte qu'on a indiquer juste aussi dans name: '', (Il ne faut pas le laisser vide lorsque c'est un point d'information)
```javascript
if (intersect.object.name === "spectrophometre infrarouge") {
        intersect.object.onClick()
        Infrarouge()
}
```

Le reste des fonctions ne sont pas utile a expliquer car il permette de faire fonctionner l'ensemble du code juste au dessus donc il ne faut pas le toucher.
## Page de modification

Lien pour y accéder : visite-virtuelle-insahdf.fr/admin

Tout est expliqué dessus 
## Demo

https://www.flexclip.com/fr/share/22329396c0808d3424536d9e4ca99dd51e3394b.html
![](https://github.com/Twenki/visite-virtuelle/blob/master/gif.gif)


## Remerciement
Pour l'aide qu'il m'ont apporté durant tout le long du projet (que ce soit prise de vue, création d'image, conseils et autre..)
 - Masi Severine
 - Depres Virgile
 - Ratli Mustafa


## Authors

- [@FlorianFrancq](https://www.github.com/#)
- [@VirgileDepres](https://www.github.com/#)

