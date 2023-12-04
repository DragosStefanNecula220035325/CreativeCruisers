@extends('header')
@section('content')
<link href="cropperjs/dist/cropper.css" rel="stylesheet">
<script src="cropperjs/dist/cropper.js"></script>

<style>img {
    display: block;
    max-width: 100%;
}

#container3D{
    background-color:black;
    width:50%;
    height:100%;
}
#container3D canvas {
  width: 100% !important;
  height: 100% !important;
  background-color: black;
 

  top: 25;
  left: 0;
}

#output {
    margin: 0 5px;
    display: block;
    max-width: 100%;
}
#customise_body{
    width:100%;
    height:400px;
    background-color:red;
    display:flex;

}

.crop-container{
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.cropped-container {
    width: 50%;
    height:100%;
    text-align: center;
    justify-content: center;
    background-color: ghostwhite;
    display: none;
}

.img-container {
    
    height:90%;
}
.crop_button{
    border-radius:0px;
    height:10%;
}

</style>
<div id="customise_body">
    <div class="crop-container">
            <div class="img-container">
                <img id="image" src="/images/pexels-artem-podrez-4816757.jpg">
            </div>
            <button id="btn-crop" class="crop_button button_main button_small button_primary">Crop</button>
        </div>

        <script>
        </script>
          <div id="container3D"></div>
    </div>
</div>

    
   

    <script type="module" src="threejsscript.js" ></script>



@endsection