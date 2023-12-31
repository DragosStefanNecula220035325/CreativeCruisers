//Import the THREE.js library
import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { OrbitControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js";
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";

window.onload = function() {


  //Step 1: Initialise everything 

    //Create a Three.JS Scene
    const scene = new THREE.Scene();
    //create a new camera with positions and angles
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

    //3D object
    let object;
  
    //Load models in the background
    const loader = new GLTFLoader();
    loader.load(
      `/models/skateboard5/scene.gltf`,
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



      //get rest of scene going
      //Instantiate a new renderer and set its size
      const renderer = new THREE.WebGLRenderer({ alpha: true }); //Alpha: true allows for the transparent background
      renderer.setSize(window.innerWidth, window.innerHeight);
      document.getElementById("container3D").appendChild(renderer.domElement);
      let objToRender = 'skateboard5';
      camera.position.z = objToRender === "skateboard5" ? 60 : 500;
      camera.position.y=-10;
      const topLight = new THREE.AmbientLight(0xffffff, 1.2); // (color, intensity)
      topLight.position.set(500, 500, 500) //top-left-ish
      const ambientLight = new THREE.AmbientLight(0x333333, objToRender === "dino" ? 5 : 1);
      scene.add(ambientLight);
      scene.add(topLight);

      //Render the scene
      function animate() {
        requestAnimationFrame(animate);
        renderer.render(scene, camera);
      }

      //Add a listener to the window, so we can resize the window and the camera
      window.addEventListener("resize", function () {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
      });

      //Orbit controls
      var controls;
      controls = new OrbitControls( camera, renderer.domElement );
      controls.listenToKeyEvents( window ); 

      //Start the 3D rendering
      animate();

  //Step 2: Get upload window working
  //get elements
  const dropZoneElement = document.querySelector(".drop-zone");
  const inputElement = document.querySelector(".drop-zone_input");

  //styling
  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone_over");
  });

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone_over");
		});
	});

  //input listening
  dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

  inputElement.addEventListener("change", (e) => {
		if (inputElement.files.length) {
			switchwindow(inputElement.files[0]);
		}
	});
  
	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();
    if(e.dataTransfer.files.length){
    inputElement.files = e.dataTransfer.files;
    switchwindow(e.dataTransfer.files[0]);
    }

	});
  
  //Step 3: Initialise cropper with new image, and then switch windows
  function switchwindow(e)
  {
    var croppedImage;
		if(e) 
    {
      //process the file
      let file = e;
      if (file.type.startsWith("image/")) 
      {
        const reader = new FileReader();
        reader.onload = function(){
        var readImage = reader.result;

        //initialise cropper
        document.getElementById('image').src = readImage;
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
        aspectRatio: 0.3333333,
        rotatable:true,
        viewMode: 1,
        });

        //get crop functionality ready
        const textureLoader = new THREE.TextureLoader();
        document.querySelector('#btn-crop').addEventListener('click', function() {
        croppedImage = cropper.getCroppedCanvas().toDataURL("image/png");
        const texture2 = textureLoader.load(croppedImage); 
        object.traverse( function ( child ) {
        if ( child.material && child.material.name == 'ThreeJS' ) {
            child.material.map=texture2;
        }
        });
        });

        // switch windows
        document.getElementById("model_window").style.display="flex";
        document.getElementById("upload_window").style.display="none";
        };
        reader.readAsDataURL(file);
      } 
    }


  }
}








