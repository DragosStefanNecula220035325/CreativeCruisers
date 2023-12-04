//Import the THREE.js library

import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
// To allow for the camera to move around the scene
import { OrbitControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js";
// To allow for importing the .gltf file
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";

//Create a Three.JS Scene
const scene = new THREE.Scene();
//create a new camera with positions and angles
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

//Keep track of the mouse position, so we can make the eye move
let mouseX = window.innerWidth / 2;
let mouseY = window.innerHeight / 2;

//Keep the 3D object on a global variable so we can access it later
let object;

//OrbitControls allow the camera to move around the scene
let controls;

//Set which object to render
let objToRender = 'skateboard5';

//Instantiate a loader for the .gltf file
const loader = new GLTFLoader();

//Load the file
var croppedImage="/images/pexels-artem-podrez-4816757.jpg"



const textureLoader = new THREE.TextureLoader();
const texture = textureLoader.load(croppedImage); 
loader.load(
  `/models/${objToRender}/scene.gltf`,
  function (gltf) {
    //If the file is loaded, add it to the scene
    object = gltf.scene;

    scene.add(object);
    console.log(object.getObjectByName("Base_Skateboard_0"));
  },
  function (xhr) {
    //While it is loading, log the progress
    console.log((xhr.loaded / xhr.total * 100) + '% loaded');
  },
  function (error) {
    //If there is an error, log it
    console.error(error);
  }

  
);

const image = document.getElementById('image');
const cropper = new Cropper(image, {
aspectRatio: 0.3333333,
rotatable:true,
viewMode: 1,
});



document.querySelector('#btn-crop').addEventListener('click', function() {

croppedImage = cropper.getCroppedCanvas().toDataURL("image/png");
// document.getElementById('output').src = croppedImage;
// document.querySelector(".cropped-container").style.display = 'flex';
const texture2 = textureLoader.load(croppedImage); 
// object.traverse(node=>
//   {
//     if(node.isMesh)node.material.map=texture2;
//   })

object.traverse( function ( child ) {

  if ( child.material && child.material.name == 'ThreeJS' ) {

      child.material.map=texture2;
  }

} );

});




//Instantiate a new renderer and set its size
const renderer = new THREE.WebGLRenderer({ alpha: true }); //Alpha: true allows for the transparent background
renderer.setSize(window.innerWidth, window.innerHeight);

//Add the renderer to the DOM
document.getElementById("container3D").appendChild(renderer.domElement);

//Set how far the camera will be from the 3D model
camera.position.z = objToRender === "skateboard5" ? 50 : 500;


//Add lights to the scene, so we can actually see the 3D model
const topLight = new THREE.DirectionalLight(0xffffff, 2.5); // (color, intensity)
topLight.position.set(500, 500, 500) //top-left-ish
topLight.castShadow = true;
scene.add(topLight);

const ambientLight = new THREE.AmbientLight(0x333333, objToRender === "dino" ? 5 : 1);
scene.add(ambientLight);

//This adds controls to the camera, so we can rotate / zoom it with the mouse


//Render the scene
function animate() {
  requestAnimationFrame(animate);
  //Here we could add some code to update the scene, adding some automatic movement


  //Make the eye move


 



  // var texture = object.getObjectByName("mesh_1").material;
  // texture.map.mapping=texture.map.mapping+4;
  // console.log(texture);
  renderer.render(scene, camera);
  
}

//Add a listener to the window, so we can resize the window and the camera
window.addEventListener("resize", function () {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});


var mouseover=false;
document.querySelector('#container3D').addEventListener('mouseover', function(){
     mouseover=true;
});

document.querySelector('#container3D').addEventListener('mouseleave', function(){
   mouseover=false;
});

let Dwindow = document.getElementById("container3D");

//add mouse position listener, so we can make the eye move
document.onmousemove = (e) => {

  if (object && mouseover===true && objToRender === "skateboard5") {
    //I've played with the constants here until it looked good 
    object.rotation.y = mouseX / Dwindow.offsetWidth ;
    object.rotation.z = mouseY  / Dwindow.offsetHeight;
  }
  
  mouseX = e.clientX;
  mouseY = e.clientY;
}




//Start the 3D rendering
animate();