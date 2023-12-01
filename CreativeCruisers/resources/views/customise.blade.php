@extends('header')
@section('content')
<link href="cropperjs/dist/cropper.css" rel="stylesheet">
<script src="cropperjs/dist/cropper.js"></script>
<script src="threejs/dist/three.js"></script>

<div class="main-container">
    <style>img {
    display: block;
    max-width: 100%;
}
.main-container {
    width: 35vw;
    margin: auto;
    display: flex;
    justify-content: center;
    flex-direction: column;
}
.img-container {
    margin-bottom: 10px;
}
.cropped-container {
    width: 400px;
    margin: auto;
    text-align: center;
    justify-content: center;
    background-color: ghostwhite;
    padding: 20px 20px;
    display: none;
    margin-top: 10px;
}
#btn-crop {
    appearance: none;
    background-color: #000000;
    border: 2px solid #1A1A1A;
    border-radius: 15px;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 16px;
    font-weight: 600;
    line-height: normal;
    min-width: 0;
    margin-left: auto;
    margin-right: auto;
    outline: none;
    padding: 10px 12px;
    text-align: center;
    text-decoration: none;
    transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: 100px;
    will-change: transform;
}
#btn-crop:disabled {
    pointer-events: none;
}

#btn-crop:hover {
    box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
    transform: translateY(-2px);
}
#btn-crop:active {
    box-shadow: none;
    transform: translateY(0);
}
#output {
    margin: 0 5px;
    display: block;
    max-width: 100%;
}</style>
        <div class="img-container">
            <img id="image" src="/images/pexels-artem-podrez-4816757.jpg">
        </div>
        <button id="btn-crop">Crop</button>
        <div class="cropped-container">
            <img src="" id="output">
        </div>
    </div>
    <script>
const image = document.getElementById('image');
const cropper = new Cropper(image, {
aspectRatio: 1.7777777777777777,
viewMode: 1
});

document.querySelector('#btn-crop').addEventListener('click', function() {
var croppedImage = cropper.getCroppedCanvas().toDataURL("image/png");
document.getElementById('output').src = croppedImage;
document.querySelector(".cropped-container").style.display = 'flex';
});
    </script>
</div>




@endsection