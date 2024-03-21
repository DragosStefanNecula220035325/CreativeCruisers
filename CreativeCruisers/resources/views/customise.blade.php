@extends('header')
@section('content')
<link href="cropperjs/dist/cropper.css" rel="stylesheet">


<style>
img {
    display: block;
    max-width: 100%;
}

#container3D{
    background-color:black;
    width:100%;
    height:90%;
}

#viewer{
    height:100%;
    width:50%;
}


#container3D canvas {
  width: 100% !important;
  height: 100% !important;
  background-color: gray;
  top: 25;
  left: 0;
}


#bottomline {
    width:100%;
    height:10%;
    background-color: green;
    display:flex;
    justify-content:center;
    align-items:center;
}

#bottomline >p {
color:white;
margin:10px;
width:100%;
text-align:center;
}

#output {
    margin: 0 5px;
    display: block;
    max-width: 100%;
}

.customise_body{
    width:100%;
    height:400px;
    background-color:white;
    display:flex;
    border-style:solid;
    border-color: black;
}

#upload{
    width:100%;
    height:400px;
    background-color:green;
    display:flex;
    border-style:solid;
    border-color: black;
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
    height:100%;
    width:100%;
}

.drop-zone{
	width:100%;
	height:100%;
	padding:25px;
	display:flex;
	align-items:center;
	justify-content:center;
	text-align: center;
	font-size:500;
	cursor:pointer;
	color: #cccccc;
	border: 4px dashed #444444;
}

.drop-zone_over{
	border-style:solid;
}

.drop-zone_input{
	display:none;
}

#model_window{
    display:none;
}
</style>

<div id="upload_window" class="customise_body">
    <div class="drop-zone">
        <span class = "drop-zone_prompt">Drop file here or click to upload.</span>
        <input type="file" name="" id="" class="drop-zone_input">
    </div>
</div>

<div id="model_window" class="customise_body">
    <div class="crop-container">
            <div class="img-container">
                <img id="image" src="/images/pexels-artem-podrez-4816757.jpg">
            </div>
            
            <div id="bottomline"><button id="btn-crop" class="crop_button button_main button_small button_primary">Crop</button></div>
    </div>
    <div id="viewer">
        <div id="container3D"></div>
        <div id="bottomline">
        <p>Controls: Drag to rotate, scroll to zoom.</p>
        <!-- <button id="btn-crop" class="crop_button button_main button_small button_primary">Done</button><div> -->
    </div>
</div>



<script src="cropperjs/dist/cropper.js"></script>
<script type="module" src="threejsscript.js" ></script>

@endsection