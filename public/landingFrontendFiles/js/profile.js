//declearning html elements

const imgDiv = document.querySelector('.btn');
const img=document.querySelector('#photo');
const file=document.querySelector('#file');
const uploadbtn =document.querySelector('#uploadbtn1');

//if user hover on img div 

imgDiv.addEventListener('mouseenter', function()
{
    uploadbtn.style.display = "block";
});

//if user hover out from img div
imgDiv.addEventListener('mouseleave', function()
{
    uploadbtn.style.display = "none";
});

//let work for image showing funtionality when we choose img to upload

file.addEventListener('change', function(){
    const choosedfile = this.files[0];
    if(choosedfile){
        const reader = new FileReader();
        reader.addEventListener('load',function(){
            img.setAttribute('src',reader.result);
        });
        reader.readAsDataURL(choosedfile);
    }
});